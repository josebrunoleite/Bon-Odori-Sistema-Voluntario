<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Auth;


class VoluntarioController extends Controller
{
    public function index()
    {
        // Exibe todos os usuários
        $users = User::all();
        return view('tabelas.vontable', compact('users'));
    }

    public function create()
    {
        // Exibe o formulário para criar um novo usuário
        
        return view('tabelas.createfiV');
    }

    public function store(Request $request)
{
    try {
        // Validação dos campos do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users'),
            ],
            'role' => 'required|string|max:255',
            'setor1' => 'required|string|max:255',
            'subsetor1' => 'required|string|max:255',
            'setor2' => 'required|string|max:255',
            'subsetor2' => 'required|string|max:255',
            'on' => 'nullable',
            'password' => 'nullable|string|max:20', // Senha agora é opcional
        ]);

        // Cria um novo usuário com base nos dados do formulário, incluindo a senha, se fornecida
        $user = User::create($request->all());

        // Verifica se um novo valor de senha foi fornecido e atualiza-a no banco de dados, se necessário
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        // Atualiza os dados de checkbox
        $checkboxData = $request->input('checkbox_data', []);
        DB::table('users')
            ->where('id', $user->id)
            ->update(['days' => json_encode($checkboxData)]);
        $user->days = json_encode($checkboxData);

        // Redireciona para uma rota específica com uma mensagem de sucesso (caso deseje)
        return redirect()->route('vontable')->with('success', 'Novo usuário criado com sucesso!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Ocorreu um erro ao criar o usuário. Por favor, tente novamente mais tarde.');
    }
}
    public function edit($id)
    {
        $user = DB::table('users')->find($id);
        $checkboxData = json_decode($user->days ?? '[]', true);
        return view('tabelas.modyfiV', compact('user', 'checkboxData'));
    }

    public function update(Request $request, $id)
{
    try {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'role' => 'required|string|max:255',
            'setor1' => 'required|string|max:255',
            'subsetor1' => 'required|string|max:255',
            'setor2' => 'required|string|max:255',
            'subsetor2' => 'required|string|max:255',
            'on' => 'nullable',
            'password' => 'nullable|string|max:20',
        ]);

        $data = $request->except('password', 'checkbox_data'); // Remover 'checkbox_data' para evitar conflitos

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        $checkboxData = $request->input('checkbox_data', []);
                DB::table('users')
                ->where('id', $id)
                ->update(['days' => json_encode($checkboxData)]);
                $user->days = json_encode($checkboxData);

        return redirect()->back()->with('success', 'Alterado com sucesso!');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar o usuário. Por favor, tente novamente mais tarde.');
    }
}

    /* public function changePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'A senha atual não corresponde.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('home')->with('success', 'Senha alterada com sucesso.');
    } */


    public function destroy($id)
    {
        $user = User::find($id);
    
        if ($user) {
            $user->delete();
            return redirect()->route('vontable')->with('success', 'Usuário excluído com sucesso!');
        } else {
            return redirect()->route('vontable')->with('error', 'Usuário não encontrado!');
        }
    }
}

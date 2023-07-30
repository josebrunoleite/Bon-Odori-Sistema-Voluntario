<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

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
            'password' => 'nullable|string|max:20', // Senha agora é opcional
        ]);
    
        // Cria um novo usuário com base nos dados do formulário, incluindo a senha, se fornecida
        $user = User::create($request->all());
    
        // Verifica se um novo valor de senha foi fornecido e atualiza-a no banco de dados, se necessário
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }
        //@dd($user);
        // Redireciona para uma rota específica com uma mensagem de sucesso (caso deseje)
        return redirect()->route('vontable')->with('success', 'Novo usuário criado com sucesso!');
    }
    public function edit($id)
    {
        $user = DB::table('users')->find($id);
        return view('tabelas.modyfiV', compact('user'));
    }

    public function update(Request $request, $id)
    {
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
            'password' => 'nullable|string|max:20', // Senha agora é opcional
        ]);
            
        $user->update($request->except('password'));
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }
        //@dd($user);
        return redirect('vontable')->with('success', 'Usuário excluído com sucesso!');
    }



    public function destroy(User $user)
    {
        // Exclui um usuário específico do banco de dados
        $user->delete();

        return redirect()->route('home')->with('success', 'Usuário excluído com sucesso!');
    }
}

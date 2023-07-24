<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Exibe todos os usuários
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        // Exibe o formulário para criar um novo usuário
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Salva um novo usuário no banco de dados
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            // Adicione outras validações para os campos adicionais, se necessário
        ]);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        // Exibe o formulário para editar um usuário específico
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Atualiza os dados de um usuário específico no banco de dados
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // Adicione outras validações para os campos adicionais, se necessário
        ]);

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        // Exclui um usuário específico do banco de dados
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers\Oficina\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oficina\Painel\UserRequest;
use App\Models\Oficina\Painel\{
    Role,
    User,
};

use Illuminate\Support\Facades\{
    Storage,
    Hash,
};

class UserController extends Controller
{
    private $user, $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Index
     */
    public function index()
    {
        if (auth()->user()->id <= '3') {
            $users = $this->user->with('role')->latest()->paginate(100000000);
        } else {
            $users = $this->user->where('id', '=', auth()->user()->id)
                ->with('role')
                ->latest()
                ->paginate(100000000);
        }
        $roles = $this->role->all('id', 'nome');
        return view('oficina.painel.pages.user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->role->all('id', 'nome');
        return view('oficina.painel.pages.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $nome_imagem = $request->image->getClientOriginalName();
            $request->image->storeAs('user', $nome_imagem);
        } else {
            $nome_imagem = 'default.jpg';
        }

        $data = $request->except('_token');
        $data['password'] = Hash::make($request->password);
        $data['image'] = $nome_imagem;

        if ($this->user->create($data)) {
            return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso');
        } else {
            return redirect()->route('user.index')->with('error', 'Falha ao cadastrar o usuário');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        if (!$user = $this->user->with('role')->where('url', $url)->first()) {
            return redirect()->back();
        }
        $roles = $this->role->all('id', 'nome');
        return view('oficina.painel.pages.user.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $url)
    {
        if (!$user = $this->user->with('role')->where('url', $url)->first()) {
            return redirect()->back();
        }
        $roles = $this->role->all('id', 'nome');
        return view('oficina.painel.pages.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $url)
    {
        if (!$user = $this->user->with('role')->where('url', $url)->first()) {
            return redirect()->back();
        }

        //Update de Imagem
        if ($request->image) {
            if (Storage::exists($user->image)) {
                Storage::delete($user->image);
            }

            $nome_imagem_edit = $request->image->getClientOriginalName();
            $request->image->storeAs('user', $nome_imagem_edit);
        } elseif ($request->image === null) {
            $nome_imagem_edit = $user['image'];
        } else {
            $nome_imagem_edit = 'default.jpg';
        }
        //Update de Imagem

        $data = $request->except('_token', '_method');
        $data['password'] = Hash::make($request->password);
        $data['image'] = $nome_imagem_edit;

        if ($user->update($data)) {
            return redirect()->route('user.index')->with('success', 'Usuário editado com sucesso');
        } else {
            return redirect()->route('user.index')->with('error', 'Falha ao editar o usuário');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $url)
    {
        if (!$user = $this->user->with('role')->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($user->id <= '4') {
            return redirect()->back()->with('error', 'Você não pode deletar usuário padrão do sistema');
        }

        if ($user->delete()) {
            return redirect()->route('user.index')->with('danger', 'Usuário excluído com sucesso!');
        } else {
            return redirect()->route('user.index')->with('error', 'Falha ao excluir o usuário');
        }
    }
}

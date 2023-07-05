<?php

namespace App\Http\Controllers\Oficina\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oficina\Painel\ResourceRequest;
use App\Models\Oficina\Painel\Resource;

class ResourceControler extends Controller
{
    private $resource;

    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Index
     */
    public function index()
    {
        $resources = $this->resource->latest()->orderBy('nome', 'ASC')->paginate(100000000);
        return view('oficina.painel.pages.resource.index', compact('resources'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('oficina.painel.pages.resource.create');
    }

    /**
     * store
     */
    public function store(ResourceRequest $request)
    {
        if ($this->resource->create($request->except('_token'))) {
            return redirect()->route('resource.index')->with('success', 'Permissão cadastrada com sucesso');
        } else {
            return redirect()->route('resource.index')->with('error', 'Falha ao cadastrar a permissão');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$resource = $this->resource->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('oficina.painel.pages.resource.show', compact('resource'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$resource = $this->resource->where('url', $url)->first()) {
            return redirect()->back();
        }

        return view('oficina.painel.pages.resource.edit', compact('resource'));
    }

    /**
     * update
     */
    public function update(ResourceRequest $request, $url)
    {
        if (!$resource = $this->resource->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($resource->update($request->except('_token', '_method'))) {
            return redirect()->route('resource.index')->with('success', 'Permissão editada com sucesso');
        } else {
            return redirect()->route('resource.index')->with('error', 'Falha ao editar a permissão');
        }
    }

    /**
     * destroy
     */
    public function destroy($url)
    {

        if (!$resource = $this->resource->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($resource->id <= '1') {
            return redirect()->back()->with('error', 'Você não pode deletar permissão padrão do sistema');
        }

        if ($resource->delete()) {
            return redirect()->route('resource.index')->with('danger', 'Permissão excluída com sucesso!');
        } else {
            return redirect()->route('resource.index')->with('error', 'Falha ao excluir a permissão');
        }
    }
}

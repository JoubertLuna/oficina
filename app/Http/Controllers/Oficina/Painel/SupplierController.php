<?php

namespace App\Http\Controllers\Oficina\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oficina\Painel\SupplierRequest;
use App\Models\Oficina\Painel\Supplier;

class SupplierController extends Controller
{
    private $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * Index
     */
    public function index()
    {
        $suppliers = $this->supplier->latest()->paginate(100000000);
        return view('oficina.painel.pages.supplier.index', compact('suppliers'));
    }

    /**
     * create
     */
    public function create()
    {
        return view('oficina.painel.pages.supplier.create');
    }

    /**
     * store
     */
    public function store(SupplierRequest $request)
    {
        if ($this->supplier->create($request->except('_token'))) {
            return redirect()->route('supplier.index')->with('success', 'Fornecedor cadastrado com sucesso');
        } else {
            return redirect()->route('supplier.index')->with('error', 'Falha ao cadastrar o fornecedor');
        }
    }

    /**
     * show
     */
    public function show($url)
    {
        if (!$supplier = $this->supplier->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('oficina.painel.pages.supplier.show', compact('supplier'));
    }

    /**
     * edit
     */
    public function edit($url)
    {
        if (!$supplier = $this->supplier->where('url', $url)->first()) {
            return redirect()->back();
        }
        return view('oficina.painel.pages.supplier.edit', compact('supplier'));
    }

    /**
     * update
     */
    public function update(SupplierRequest $request, $url)
    {
        if (!$supplier = $this->supplier->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($supplier->update($request->except('_token', '_method'))) {
            return redirect()->route('supplier.index')->with('success', 'Fornecedor editado com sucesso');
        } else {
            return redirect()->route('supplier.index')->with('error', 'Falha ao editar o fornecedor');
        }
    }

    /**
     * excluir
     */
    public function destroy($url)
    {

        if (!$supplier = $this->supplier->where('url', $url)->first()) {
            return redirect()->back();
        }

        if ($supplier->delete()) {
            return redirect()->route('supplier.index')->with('danger', 'Fornecedor excluído com sucesso!');
        } else {
            return redirect()->route('supplier.index')->with('error', 'Falha ao excluir o fornecedor');
        }
    }
}

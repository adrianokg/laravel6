<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('nome')->get();
        return View('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'date_format' => 'Data de nascimento inválida.',
        ];
        $this->validate($request, [
            'nome' => 'required',
            'sexo' => 'required',
            'data_nascimento' => 'required|date_format:d/m/Y',
        ], $messages);
        $data_nascimento = $request->get('data_nascimento');
        $dataFormatada = \Carbon\Carbon::createFromFormat('d/m/Y', $data_nascimento)->format('Y-m-d');
        $cliente = Cliente::create($request->except('data_nascimento') + ['data_nascimento' => $dataFormatada]);
        return redirect()->route('clientes.index')->with('message','Cliente cadastrado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'date_format' => 'Data de nascimento inválida.',
        ];
        $this->validate($request, [
            'nome' => 'required',
            'sexo' => 'required',
            'data_nascimento' => 'required|date_format:d/m/Y',
        ], $messages);
        if($request->get('data_nascimento'))
        {
            $dataFormatada = \Carbon\Carbon::createFromFormat('d/m/Y', $request->get('data_nascimento'))->format('Y-m-d');
            Cliente::findOrFail($id)->update($request->except('data_nascimento') + ['data_nascimento' => $dataFormatada]);
        }
        else
            Cliente::findOrFail($id)->update($request->except('data_nascimento'));
        return redirect()->back()->with('message','Cliente alterado com sucesso!');
    }

    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return redirect()->route('clientes.index')->with('message', 'Cliente removido com sucesso!');
    }
}

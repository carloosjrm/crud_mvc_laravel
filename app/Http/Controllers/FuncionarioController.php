<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index(){
        $funcionarios = Funcionario::orderBy('id','desc')->paginate(5);
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create(){
        return view('funcionarios.create');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'endereco' => 'required',
        ]);
        Funcionario::create($request->post());

        return redirect()->route('funcionarios.index')->with('success','Funcionario criado com sucesso.');
    }

    public function show(Funcionario $funcionario){
        return view('funcionarios.show',compact('funcionario'));
    }

    public function edit(Funcionario $funcionario){
        return view('funcionarios.edit',compact('funcionario'));
    }

    public function update(Request $request, Funcionario $funcionario) {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'endereco' => 'required',
        ]);
        
        $funcionario->fill($request->post())->save();

        return redirect()->route('funcionarios.index')->with('success','Funcionario atualizado com sucesso.');
    }

    public function destroy(Funcionario $funcionario){
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success','Funcionario excluido com sucesso.');
    }
}
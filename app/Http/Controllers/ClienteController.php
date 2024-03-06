<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClientFormRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query=trim($request->get('texto'));
        $clientes=DB::table('persona')->where('nombre','LIKE', '%'. $query.'%')
        ->where('tipo_persona', '=','Cliente')
        ->where('estatus', '=','1')
        ->orderBy('id_persona','desc')
        ->paginate(7);
        return view('ventas.clientes.index',["clientes"=>$clientes,"texto"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("ventas.clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientFormRequest $request)
    {
        $cliente=new Cliente;
        $cliente->tipo_persona='Cliente';
        $cliente->nombre=$request->input('nombre');
        $cliente->tipo_documento=$request->input('tipo_documento');
        $cliente->num_documento=$request->input('num_documento');
        $cliente->direccion=$request->input('direccion');
        $cliente->telefono=$request->input('telefono');
        $cliente->email=$request->input('email');
        $cliente->estatus='1';
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view("ventas.clientes.show",["clientes"=>Cliente::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view("ventas.clientes.edit",["cliente"=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientFormRequest $request,$id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->nombre=$request->input('nombre');
        $cliente->tipo_documento=$request->input('tipo_documento');
        $cliente->num_documento=$request->input('num_documento');
        $cliente->direccion=$request->input('direccion'); 
        $cliente->telefono=$request->input('telefono');
        $cliente->email=$request->input('email');
        $cliente->update();
        return Redirect::to('ventas/clientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->estatus='0';
        $cliente->update();
        return redirect()->route('clientes.index')
        ->with('success','Cliente eliminado correctamente'); 
    }
}

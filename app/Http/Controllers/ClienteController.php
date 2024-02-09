<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClientFormRequest;
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
        ->where('tipo_persona', '=','cliente')
        ->orderBy('id_persona','desc')
        ->paginate(10);
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
        $cliente->tipo_persona=$request->get('tipo_persona');
        $cliente->nombre=$request->get('nombre');
        $cliente->tipo_documento->get('tipo_documento');
        $cliente->num_documento->get('num_documento');
        $cliente->direccion->get('direccion');
        $cliente->telefono->get('telefono');
        $cliente->email->get('email');
        $cliente->save();
        return Redirect::to('ventas/clientes');
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
        return view("ventas.clientes.edit",["clientes"=>Cliente::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientFormRequest $request, string $id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->tipo_persona=$request->get('tipo_persona');
        $cliente->nombre=$request->get('nombre');
        $cliente->tipo_documento->get('tipo_documento');
        $cliente->num_documento->get('num_documento');
        $cliente->direccion->get('direccion'); 
        $cliente->telefono->get('telefono');
        $cliente->email->get('email');
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
        return redirect()->route('client.index')
        ->with('success','Cliente eliminado correctamente'); 
    }
}

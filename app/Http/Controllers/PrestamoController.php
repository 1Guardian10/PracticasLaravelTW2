<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::orderBy('created_at', 'desc')->paginate(15);

        return view('Prestamos.index', compact('prestamos'));
    }

    public function create(){

        $clientes=Cliente::All();

        $libros=Libro::where('estado',true)->get();

        return view('Prestamos.agregar', compact('clientes','libros'));
    }

    public function edit($id){
        $clientes=Cliente::All();

        $libros=Libro::where('estado',true)->get();

        $prestamo = Prestamo::findOrFail($id);

        return view('Prestamos.editar', compact('clientes','libros','prestamo'));
    }

    public function guardar(Request $request){
        $request->validate(
            [
                'fecha_prestamo'=>'required',
                'estado'=>'required',
                'idcliente'=>'required',
                'idlibros'=>'required'
            ]
        );

        $datos=$request->all();

        Prestamo::create($datos);

        return redirect()->route('prestamos.index')->with('sucess','prestamo agregado con exito');
    }

    public function actualizar(Request $request, Prestamo $prestamo){
        $request->validate(
            [
                'fecha_prestamo'=>'required',
                'estado'=>'required',
                'idcliente'=>'required',
                'idlibros'=>'required'
            ]
        );

        $prestamo->update($request->all());

        return redirect()->route('prestamos.index')->with('sucess','Prestamo editado con exito');
    }

        public function delete($id)
    {
        Prestamo::where('id', $id)->delete();
        return redirect()->route('prestamos.index')->with('sucess','Prestamo eliminado con exito');
    }
}

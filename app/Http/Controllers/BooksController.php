<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Libro;

class BooksController extends Controller
{
    //
    public function index()
    {
        $libros = Libro::orderBy('created_at', 'desc')->paginate(15);

        return view('Books.index', compact('libros'));
    }

    public function create(){
        return view('Books/registrarLibro');
    }
    
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('Books.editar', compact('libro'));
    }

    public function delete($id)
    {
        Libro::where('id', $id)->delete();
        return redirect()->route('libros.index')->with('sucess','Libro eliminado con exito');
    }

    public function plantilla(){
        return view('Layouts/plantilla');
    }

    public function guardar(Request $request){
        $request->validate(
            [
                'titulo'=>'required|min:3',
                'autor'=>'required|min:3',
                'editorial'=>'required|min:5',
                'anio'=>'required|digits:4|integer',
                'fecha_publicacion'=>'required',
                'categoria'=>'required',
                'DOI'=>'required|min:10',
                'imagen'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]
        );

        $datos=$request->all();
        
        if($request->hasFile('imagen')){
            $path=$request->file('imagen')->store('imagenes','public');
            $datos['imagen']=$path;
        }

        $datos['estado']=true;

        Libro::create($datos);
        
        return redirect()->route('libros.index')->with('sucess','Libro agregado con exito');
    }

    public function editar(Request $request, Libro $libro){
        $request->validate(
            [
                'titulo'=>'required|min:3',
                'autor'=>'required|min:3',
                'editorial'=>'required|min:5',
                'anio'=>'required|digits:4|integer',
                'fecha_publicacion'=>'required',
                'categoria'=>'required',
                'DOI'=>'required|min:10',
                'imagen'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]
        );

        $datos=$request->all();
        
        if($request->hasFile('imagen')){
            $path=$request->file('imagen')->store('imagenes','public');
            $datos['imagen']=$path;
        }

        $libro->update($datos);

        return redirect()->route('libros.index')->with('sucess','Libro editado con exito');
    }   
}
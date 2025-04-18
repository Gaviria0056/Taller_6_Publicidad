<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publicaciones = Publicacion::with('user')->get();
        return view('publicaciones.index', compact('publicaciones'));
    }

    public function create()
    {
        return view('publicaciones.create');
    }

    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
        ]);

        try {
            Publicacion::create([
                'titulo' => $request->titulo,
                'contenido' => $request->contenido,
                'user_id' => auth()->id(),  // Guarda el ID del usuario autenticado
            ]);

            return redirect()->route('publicaciones.index')->with('success', 'Publicación registrada correctamente.');
        } catch (\Throwable $th) {
            \Log::error('Error al crear publicación: ' . $th->getMessage());
            return redirect()->route('publicaciones.index')->with('error', 'Error al registrar la publicación.');
        }
    }

    public function edit($id){
        $publicacion = Publicacion::findOrFail($id);

        if ($publicacion->user_id !== auth()->id()) {
            return redirect()->route('publicaciones.index')->with('error', 'No tienes permiso para editar esta publicación.');
        }

        return view('publicaciones.edit', compact('publicacion'));
    }

    public function update(Request $request, $id){
        $publicacion = Publicacion::findOrFail($id);

        if ($publicacion->user_id !== auth()->id()) {
            return redirect()->route('publicaciones.index')->with('error', 'No tienes permiso para actualizar esta publicación.');
        }

        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
        ]);

        $publicacion->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación actualizada correctamente.');
    }

    public function destroy($id){
        $publicacion = Publicacion::findOrFail($id);

        if ($publicacion->user_id !== auth()->id()) {
            return redirect()->route('publicaciones.index')->with('error', 'No tienes permiso para eliminar esta publicación.');
        }

        $publicacion->delete();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación eliminada correctamente.');
    }

    public function show($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        return view('publicaciones.show', compact('publicacion'));
    }
}

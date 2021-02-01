<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tareas;

class TareasController extends Controller
{
    public function index()
    {
        $Tarea = Tareas::latest()->paginate(7);
        return view('Tareas.index', compact('Tarea'))
          ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    public function create()
    {
        return view('Tareas.crear');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $tareas = new Tareas;
        $tareas->nombre = $request->name;
        $tareas->detalles = $request->detail;
        $tareas->save();
        return redirect()->route('Tareas.index')
                        ->with('success', 'Se guardo.');
    }
    public function show($id)
    {
        $tareas = Tareas::find($id);
        return view('Tareas.listar', compact('tareas'));
    }
    public function edit($id)
    {
        $tarea = Tareas::find($id);
        return view('Tareas.editar', compact('tarea'));
    }
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        $data = $request->all();
        $tarea = Tareas::find($id);
        $tarea->nombre = $data['name'];
        $tarea->detalles = $data['detail'];
        $tarea->save();

        return redirect()->route('Tareas.index')
                        ->with('success', 'Se guardo');
    }
    public function destroy($id)
    {
        Tareas::find($id)->delete();
        return redirect()->route('Tareas.index')
                       ->with('success', 'Eliminado');
    }
}

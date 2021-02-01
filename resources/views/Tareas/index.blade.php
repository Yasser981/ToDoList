@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tareas</h2>
            </div>
            <div class="pull-right">
                @can('tareas.create')
                <a class="btn btn-success" href="{{ route('Tareas.create') }}">Nueva Tarea</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tarea</th>
            <th>Detalle</th>
            <th width="280px">Acciones</th>
        </tr>
	    @foreach ($Tarea as $Tarea)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $Tarea->nombre }}</td>
	        <td>{{ $Tarea->detalles }}</td>
	        <td>
                <form action="{{ route('Tareas.destroy',$Tarea->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('Tareas.show',$Tarea->id) }}">Ver</a>
                    @can('tareas.edit')
                    <a class="btn btn-primary" href="{{ route('Tareas.edit',$Tarea->id) }}">Editar</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('tareas.destroy')
                    {!! Form::open(['method' => 'DELETE','route' => ['Tareas.destroy', $Tarea->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

@endsection

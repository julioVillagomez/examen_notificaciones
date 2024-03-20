@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-10 m-auto">

            <div class="card">
                <div class="card-header">
                    Historial Notificaciones
                </div>
                <div class="card-body">
                   
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Categoria</th>
                                <th>Mensaje</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->user->name }}</td>
                                    <td>{{ $log->user->email }}</td>
                                    <td>{{ $log->user->phone }}</td>
                                    <td>{{ $log->category }}</td>
                                    <td>{{ $log->message }}</td>
                                    <td>{{ $log->type }}</td>
                                    <td>{{ $log->created_at->format('d/m/Y H:m:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">{{ $logs->links() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            
        </div>
    </div>
@endsection

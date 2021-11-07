@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <h5 class="card-title">informacion</h5>
                        <a href="{{route('user')}}" class="btn btn-dark">Usuarios</a>
                        <a href="{{route('resource')}}" class="btn btn-dark">Recursos</a>
                    </div>
                    <br>
                    <div>
                        <h5 class="card-title">Asignacion</h5>
                        <a href="{{route('resourcexuser')}}" class="btn btn-dark">Recursos x Usuario</a>

                        <a href="{{route('resourcexuser.hist')}}" class="btn btn-dark">Historial Recursos x Usuario</a>
                        
                    </div>

                    
                </div>
                <div class="card-footer">
                    <a href="{{route('logout')}}" class="btn btn-danger">Salir</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

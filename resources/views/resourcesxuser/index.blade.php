@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="alert">
                @include('flash-message')
            </div>
            <div id='list'>
                <div class="row">
                    <div class="col">
                        <p>
                            Recursos asignados a los usuarios 
                        </p>
                    </div>
                    <div class="col-2">
                        <a href="{{route('resourcexuser.add')}}" class="btn btn-primary">Recurso a usuario</a>
                    </div>
                </div>
                <br>
                <div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id recurso</th>
                            <th scope="col">Nombre recurso</th>
                            <th scope="col">Id usuario</th>
                            <th scope="col">Nombre usuario</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($resources_user as $asoc)
                                @if ($asoc->state == 1)
                                    <tr>
                                        <th scope="row">{{$asoc->id}}</th>
                                        <td>{{@$asoc->resource_id}}</td>
                                        <td>{{@$asoc->resourcesUser->name}}</td>
                                        <td>{{@$asoc->user_id}}</td>
                                        <td>{{@$asoc->usersResources->name}}</td>
                                    </tr>
                                @endif
                            @empty
                                no hay asociaciones de recursos a usuarios
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

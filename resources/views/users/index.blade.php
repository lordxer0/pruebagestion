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
                            usuarios disponibles 
                        </p>
                    </div>
                </div>
                <br>
                <div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user['id']}}</th>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

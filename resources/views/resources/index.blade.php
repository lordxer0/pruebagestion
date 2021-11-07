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
                            recursos disponibles para los usuarios 
                        </p>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary">+ Recurso</button>
                    </div>
                </div>
                <br>
                <div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Marca</th>
                            <th scope="col">S/N</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($resources as $item)
                                <tr>
                                    <th scope="row">{{$item['id']}}</th>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['category']}}</td>
                                    <td>{{$item['mark']}}</td>
                                    <td>{{$item['seria_number']}}</td>
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

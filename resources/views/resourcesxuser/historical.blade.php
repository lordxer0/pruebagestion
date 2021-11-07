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
                            Historial de Recursos asignados a los usuarios 
                        </p>
                    </div>
                    <div class="col-6">
                        <label for="resource">Recursos</label>
                        <select class="select custom-select" name="resource_id" id="resource">
                            @forelse ($resources as $resource)
                                <option value="{{$resource->id}}">{{$resource->name}}</option>                                    
                            @empty
                                <option value="" selected disabled>no se encontraron usuarios</option>                                       
                            @endforelse
                        </select>
                    </div>
                </div>
                <br>
                <div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha asignacion</th>
                            <th scope="col">Id recurso</th>
                            <th scope="col">Nombre recurso</th>
                            <th scope="col">Id usuario</th>
                            <th scope="col">Nombre usuario</th>
                          </tr>
                        </thead>
                        <tbody id="table-historical">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        chargehist();
    })
    
    $('#resource').on('change',chargehist);

    function chargehist(){
        let resource = $('#resource').val(); 
        $.ajax({
            type: "POST",
            url: "{{route('resourcexuser.tableHistorical')}}",
            data: {resource_id: resource}
        }).done(function(data){
            $('#table-historical').html(data);
        }).fail(function(response, error){
            console.log(error+ ' - ' +response.status+ ': ' +response.statusText);
        });
    }

</script>

@endsection

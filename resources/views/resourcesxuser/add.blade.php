@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="alert">
                @include('flash-message')
            </div>
            <div class="card">
                <div class="card-header">{{ __('Nueva Asociacion') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('resourcexuser.add') }}">
                        @csrf
                        <div class="row"> 
                            <div class="col-md-10">
                                <label for="users">Usuarios</label>
                                <select class="select custom-select" name="user_id" id="user">
                                    @forelse ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>                                    
                                    @empty
                                        <option value="" selected disabled>no se encontraron usuarios</option>                                       
                                    @endforelse
                                </select>
                                <br>
                                <br>
                                <div id="div_resources">
                                    
                                </div>
                            </div>
                            <div style="margin-top: 6rem" class="col-md-2">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Asociar') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
        chargeResource();
    })
    
    $('#user').on('change',chargeResource);

    function chargeResource(){
        let user = $('#user').val(); 
        $.ajax({
            type: "POST",
            url: "{{route('resourcexuser.selectResource')}}",
            data: {user_id: user}
        }).done(function(data){
            $('#div_resources').html(data);
        }).fail(function(response, error){
            console.log(error+ ' - ' +response.status+ ': ' +response.statusText);
        });
    }

</script>
@endsection

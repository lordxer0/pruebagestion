
<label for="resources">Recursos</label>
<select multiple class="select custom-select" name="resources_id[]" id="resources">
    @forelse ($resources as $resource)
        <option {{ in_array($resource->id,$resources_user) ? 'selected' : '' }} value="{{$resource->id}}">{{$resource->name}}</option>                                    
    @empty
        <option value="" selected disabled>no se encontraron recursos</option>                                       
    @endforelse
</select>  

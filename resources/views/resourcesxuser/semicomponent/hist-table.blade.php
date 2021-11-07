
@forelse ($resources_user as $asoc)
    <tr>
        <th scope="row">{{$asoc->id}}</th>
        <td>{{@$asoc->created_at}}</td>
        <td>{{@$asoc->resource_id}}</td>
        <td>{{@$asoc->resourcesUser->name}}</td>
        <td>{{@$asoc->user_id}}</td>
        <td>{{@$asoc->usersResources->name}}</td>
    </tr>
@empty
no hay historial para este recurso
@endforelse 
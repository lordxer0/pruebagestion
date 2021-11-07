<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\User;
use App\ResourcesUser;

class ResourceUserController extends Controller
{
    
    public function index(){

        $resources_user = ResourcesUser::all();
        
        return view('resourcesxuser.index',compact('resources_user'));
    }

    public function add(Request $request){

        if($request->isMethod('POST')){

            $data = $request->all();

            if($this->create($data)){
                $message  = [
                    'success' => 'Asignado' 
                ];
            }else{
                $message  = [
                    'error' => 'Fallo' 
                ];
            }
            return redirect()->back()->with($message);
        }

        $users = User::all();

        return view('resourcesxuser.add',compact('users'));

    }


    protected function create(array $data)
    {
        $user = User::find($data['user_id']);
        if(isset($user)){
            if(isset($data['resources_id'])){

                foreach ($data['resources_id'] as $key => $resource) {
                    $user_temp = $user->resources->where('resource_id',$resource)->last();
                    if(isset($user_temp)){
                        if($user_temp->state == 1){
                            continue;
                        }else{
                            $user->resources()->create([
                                'resource_id' => $resource,
                                'state' => 1
                            ]);
                        }
                    }else{
                        $user->resources()->create([
                            'resource_id' => $resource,
                            'state' => 1
                        ]);
                    }
                }
                $user->resources()->whereNotIn('resource_id',$data['resources_id'])->update(['state' => 0]);

                return true;

            }else{
                $user->resources()->update(['state' => 0]);
                return true;
            }
        }

        return false;
    }

    protected function selectResource(Request $request)
    {
        if($request->ajax()){
            $data =  $request->all();
            $resources = Resource::all();
            $resources_user = ResourcesUser::select('resources_users.resource_id')
                ->where('user_id',$data['user_id'])
                ->where('state',1)
                ->pluck('resource_id')
                ->toArray();

            return view('resourcesxuser.semicomponent.select-resources',compact('resources','resources_user'));
            
        }
    }

    public function historical(){
        
        $resources = Resource::all();

        return view('resourcesxuser.historical',compact('resources'));
    }

    protected function resourceHistorical(Request $request)
    {
        if($request->ajax()){
            $data =  $request->all();
            $resources_user = ResourcesUser::select()
            ->where('resource_id',$data['resource_id'])->get();

            return view('resourcesxuser.semicomponent.hist-table',compact('resources_user'));
            
        }
    }


}

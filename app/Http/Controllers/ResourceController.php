<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;

class ResourceController extends Controller
{
    
    public function index(){

        $resources = Resource::all();

        return view('resources.index',compact('resources'));
    }

    public function add(Request $request){
        
        if($request->isMethod('POST')){

            $data = $request->all();

            if($this->create($data)){
                $message  = [
                    'success' => 'Creado' 
                ];
            }else{
                $message  = [
                    'error' => 'fallo' 
                ];
            }
            return redirect()->back()->with($message);
        }
        return view('resources.add');

    }


    protected function create(array $data)
    {
        return Resource::create([
            'name' =>$data['name'],
            'category' => $data['category'],
            'mark' => $data['mark'],
            'seria_number' =>$data['seria_number']
        ]);
    }
}

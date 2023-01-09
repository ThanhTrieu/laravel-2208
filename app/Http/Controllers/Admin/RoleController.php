<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Module;

class RoleController extends Controller
{
    public function index()
    {
        // man hanh danh sach vai tro
        return view('admin.roles.index');
    }

    public function create()
    {
        /*
            [
                ['module_id' => 1, 'module_name' => 'QLHV', 'actions' => [[],[],[]]],
                [],
            ];
        */
        $actions = Action::all()->toArray();
        $modules = Module::all()->toArray();
 
        foreach($modules as $key => $m){
            foreach($actions as $a){
                $modules[$key]['actions'][] = $a;
            }
        }
        //return view('admin.roles.create',compact('modules'));
        return view('admin.roles.create',['modules' => $modules]);
    }
}

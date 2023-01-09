<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Module;
use App\Models\Role;
use App\Http\Requests\RoleStorePost;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        // man hanh danh sach vai tro
        $roles = Role::paginate(10);
        return view('admin.roles.index', compact('roles'));
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
        //dd($modules);
        return view('admin.roles.create',[
            'modules' => $modules,
            'countActions' => count($actions),
            'actions' => $actions
        ]);
    }

    public function store(RoleStorePost $request)
    {
        // insert roles table
        $role = new Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->status = ACTIVE_STATUS;
        // save data
        $role->save();
        $roleId = $role->id; // lay ra dc id vua inster vao database

        // insert data to action_module table
        $arrIdActionModule = [];
        $permissions = $request->permissions;
        foreach($permissions as $module_id => $actions) {
            foreach($actions as $action_id) {
                $arrIdActionModule[] = DB::table('action_module')->insertGetId([
                    'action_id' => $action_id,
                    'module_id' => $module_id,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        }

        // insert data to role_action_module table
        if(!empty($arrIdActionModule) && $roleId > 0) {
            foreach($arrIdActionModule as $id){
                DB::table('role_action_module')->insert([
                    'role_id' => $roleId,
                    'action_module_id' => $id,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        }

        return redirect()->back()->with(CREATE_ACTION_SUCCESS_LABEL, CREATE_ACTION_SUCCESS);
    }

    public function edit(Request $request)
    {
        //dd($request->id);
        $roleId = $request->id;
        $roleId = is_numeric($roleId) ? $roleId : 0;

        $infoRole = Role::find($roleId);
        if(!empty($infoRole)){

        } else {
            
        }
    }
}

<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Action;
use App\Models\Module;

class DemoController extends Controller
{
    // lay ra username theo role id
    public function test()
    {
        // 1 id bang role
        $username = Role::find(1)->users()->where('username', 'giaovu')->first();
        dd($username->id);
    }

    public function testv2()
    {
        $user = User::find(1);
        $roleName = $user->roles->name;
        dd($roleName);
    }

    public function testV3()
    {
        $action = Action::find(1);
        foreach($action->modules as $key => $ac){
            print_r($ac->name); // ten module theo id action bang 1
            echo '<br/>';
        }
    }

    public function testV4()
    {
        $modules = Module::find(1);
        foreach($modules->actions as $key => $module){
            echo $module->pivot->deleted_at; // du lieu bang trung gian
            echo "<br/>";
            echo $module->name; // ten action theo id module bang 1
            echo "<br/>";
            echo $modules->slug_key; // bang module
            echo "<br/>";
        }
    }
}

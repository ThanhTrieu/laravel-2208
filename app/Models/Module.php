<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Action;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'modules';

    protected $fillable = [
        'name',
        'slug_key',
        'router_name',
        'icon',
        'parent_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function actions()
    {
        return $this->belongsToMany(Action::class,'action_module', 'action_id', 'module_id')->withPivot('deleted_at')->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Module;

class Action extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'actions';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function modules()
    {
        return $this->belongsToMany(Module::class,'action_module','action_id','module_id');
    }
}

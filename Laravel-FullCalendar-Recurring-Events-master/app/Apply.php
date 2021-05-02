<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Apply extends Model
{
    use SoftDeletes;

    public $table = 'Apply';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'project_id',
        'status' => [ "accepted","declined","awaiting"],
        'user_id',
        
    ];

    public function applys()
    {
        return $this->belongsToMany(Apply::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public $incrementing = false;




    public function task_group()
    {
        return $this->belongsTo(TaskGroup::class);
    }
    public function toggleIsActive()
    {
        $this->is_active = !$this->is_active;
        return $this;
    }

    // public  function getIsActiveAttribute($attr)
    // {

    //     if ($attr == 0) {
    //         $attr = 'Pending  ';
    //     } else {
    //         $attr = 'Done ';
    //     }

    //     return  $attr;
    // }



}
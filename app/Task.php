<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function priority(){
        return $this->hasOne('App\Priority', 'id', 'priority_id');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'assignee_id');
    }
}

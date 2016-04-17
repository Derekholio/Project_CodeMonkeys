<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussions extends Model
{
    //
    public $timestamps = false;
    
    public static function getDiscussionsForPost($id){
        $discussions = Discussions::where('task_id', $id)
                ->orderBy('posted_time', 'asc')
                ->get();
        
        return $discussions;
    }
    
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}

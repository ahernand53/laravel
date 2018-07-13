<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function validator(User $me, Conversation $conversation){

        foreach ($conversation->users as $user){

            if($user->id == $me->id){
                return true;
            }

        }

        return false;

    }
}

<?php


namespace App\Helpers;

use App\Models\User;
use App\Helpers\GravatarHelper;


//
//Image helper class

class ImageHelper{

    public static function getUserImage($id){
        $user = User::find($id);
        $avatar_url = "";
        if(!is_null($user)){
            
            if($user->avatar == NULL){
                // return him gravatar image
                if(GravatarHelper::validate_gravatar($user->email)){
                   $avatar_url =  GravatarHelper::validate_gravatar($user->email, 100);
                } else {
                   // when there is no gravatar image
                   $avatar_url = url('images/default/User1.png'); 
                }
            }
            else{
                // return that image
                 $avatar_url = url('images/users/'.$user->avatar); 
            }
            
        } else {
            return redirect('/');    
        }
        return $avatar_url;
    }
}


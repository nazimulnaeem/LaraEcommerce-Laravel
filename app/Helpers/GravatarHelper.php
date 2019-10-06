<?php


namespace App\Helpers;

// gravatar helper for email image

class GravatarHelper{

//    validate gravatar
//    
//    check if the image has gravatar image or not 
//    
//        @param string $email Email of the User
//    @return boolean   true  if there is an image otherwise false 

public static function validate_gravatar($email) {
    $hash = md5($email);
    $uri = 'http://www.gravatar.com/avatar' . $hash . '?d=404';
    $headers = @get_headers($uri);

    if (!preg_match("|200|", $headers[0])) {
        $has_valid_avatar = FALSE;
    } else {
        $has_valid_avatar = TRUE;
    }

    return $has_valid_avatar;
}

//gravatar_image
//
//get the gravatar imame from an Email address
//
//@param string $email User Email
//        @param integer $size size of image
//        @param string $d type of image if not gravatar image
//            @param string gravatar image
//            

public static function gravataar_image($email, $seze = 0, $d = "") {

    $hash = md5($email);
    $image_url = 'http://www.gravatar.com/avatar/' . $hash . '?s=' . $size . '&d=' . $d;

    return $image_url;
}

}

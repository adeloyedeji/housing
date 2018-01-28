<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagingController extends Controller
{
    public function chat($phone) {
        $profile = \App\Profile::where('phone',$phone)->first();

        if($profile):
            $user = \App\User::find($profile->user_id);
            return view('messaging.chat', [
                'user'  =>  $user,

            ]);
        else:
            abort(404);
        endif;
        
    }

    public function get_people_nearby($id) {
        $users = [];
        $user = \App\User::find($id);
        
        $profiles_near_by = \App\Profile::where('city', 'LIKE',  '%' . $user->profile->city . '%')->get();

        if(count($profiles_near_by) > 0):
            foreach($profiles_near_by as $profile):
                $users[] = \App\User::find($profile->user_id);
            endforeach;
        endif;

        return $users;
    }

    public function get_currently_chatting($phone) {
        $profile = \App\Profile::where('phone', $phone)->first();

        if($profile):
            $user = \App\User::find($profile->user_id);

            return $user;
        else:
            return 1;
        endif;
    }
}

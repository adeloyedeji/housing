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
        if(strlen($phone) == 10):
            $profile = \App\Profile::where('phone', '0' + $phone)->first();
        else:
            $profile = \App\Profile::where('phone', $phone)->first();
        endif;

        if(count($profile) > 0):
            $user = \App\User::find($profile->user_id);

            return $user;
        else:
            return 1;
        endif;
    }

    public function load_messages($user_id, $chat_id) {
        $chat = [];
        $chat_sent = [];
        $chat_received = [];
        $chat_sent_to   =   \App\Chat::where('sender_id', $user_id)
                            ->where('recipient_id', $chat_id)
                            ->skip(0)
                            ->take(50)
                            ->latest()
                            ->get();

        foreach($chat_sent_to as $chat):
            array_push($chat_sent, $chat);
        endforeach;

        $chat_received_from =   \App\Chat::where('recipient_id', $user_id)
                                ->where('sender_id', $chat_id)
                                ->skip(0)
                                ->take(50)
                                ->latest()
                                ->get();

        foreach($chat_received_from as $chat):
            array_push($chat_received, $chat);
        endforeach;

        $chat = array_merge($chat_sent, $chat_received);

        usort($chat, function($p1, $p2) {
            return $p1->id > $p2->id;
        });
        return $chat;
    }

    public function post_message(Request $request) {        
        $chat;
        $element;
        $data = array(
            'sender_id'     =>  \Auth::id(),
            'recipient_id'  =>  $request->id,
            'message'       =>  $request->chat,
            'status'        =>  0,
        );

        $validator = \Validator::make($data, [
            'message'   =>  'required|string'
        ]);

        if($validator->fails()):
            //return $validator->errors();
            return -1;
        endif;

        $chat = \App\Chat::create($data);

        if(count($chat) > 0):
            \App\User::find($chat->recipient_id)->notify(new \App\Notifications\NewMessageNotification($chat));
        
            $element     =   "<div class='col-sm-12 message-main-sender'>";
            $element    .=  "<div class='sender'>";
            $element    .=  "<div class='message-text'>" . $request->chat . "</div>";
            $element    .=  "<span class='message-time pull-right'>Just now</span>";
            $element    .=  "</div>";
            $element    .=  "</div>";
        else:
            $chat = -2;
            $element = -2;
        endif;

        return $chat;
    }
}

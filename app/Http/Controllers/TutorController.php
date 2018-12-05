<?php

namespace App\Http\Controllers;
use Auth;
use Admin;
use App\User;
use App\Tutormessage;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function compose(){
        return view('/tutor/compose');
    }

    public function store(Request $request){

        $this->validate($request,[
            'subject'=>'required',
            'message'=>'required'
        ]);
        $id=Auth::user()->id;
        $tutorMessage=new Tutormessage([
            'subject'=>$request->subject,
            'message'=>$request->message,
            'user_id'=>$id
        ]);
        if($tutorMessage->save()){
            return redirect()->back()->with('status', 'Your message is sent');
        }
        else{
            return redirect()->back()->with('status', 'Your message is not sent');
        };
    }
}

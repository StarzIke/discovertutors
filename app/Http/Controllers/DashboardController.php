<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class DashboardController extends Controller
{
    public function index(){
        return view('pages.dashboard');
    }

    public function message(){
        return view('pages.dashmessage');
    }

    public function profile(){
       $users=User::all();
        return view('pages.dashprofile', compact('users'));
    }

    public function storeprofile(Request $request){
        $this->validate($request,[
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'city'=>'required',
        'profile_picture'=>'required|max:2048|',
        'cv'=>'required|max:2048',
        'cover_letter'=>'required|max:2048',
        'video'=>'required|max:10240|mimetypes: video/avi', 'video/mpeg', 'video/mp4','video/3gp','video/mkv',
        'personal_profile'=>'required',
        'gender'=>'required',
        'charges'=>'required',
        'tagline'=>'required',
        'job_type'=>'required',
        'subject'=>'required',
        ]);
        $filename= $request->file('cv')->getClientOriginalName();
        $file=pathinfo($filename, PATHINFO_FILENAME);
        $ext=$request->file('cv')->getClientOriginalExtension();        
        $tostore=$file . "_" . time() . "." . $ext;
        $path=$request->file('cv')->storeAs('public/upload', $tostore);
        
        $filename= $request->file('cover_letter')->getClientOriginalName();
        $file=pathinfo($filename, PATHINFO_FILENAME);
        $ext=$request->file('cover_letter')->getClientOriginalExtension();        
        $tosave=$file . "_" . time() . "." . $ext;
        $path=$request->file('cover_letter')->storeAs('public/upload', $tosave);
        
        $filename= $request->file('profile_picture')->getClientOriginalName();
        $file=pathinfo($filename, PATHINFO_FILENAME);
        $ext=$request->file('profile_picture')->getClientOriginalExtension();        
        $touplaod=$file . "_" . time() . "." . $ext;
        $path=$request->file('profile_picture')->storeAs('public/upload', $toupload);

        $filename= $request->file('video')->getClientOriginalName();
        $file=pathinfo($filename, PATHINFO_FILENAME);
        $ext=$request->file('video')->getClientOriginalExtension();        
        $toadd=$file . "_" . time() . "." . $ext;
        $path=$request->file('video')->storeAs('public/upload', $toadd);
        
        $profiles=new Profile;            
        $profiles->name=$request->input('name');
        $profiles->email=$request->input('email');
        $profiles->phone=$request->input('phone');
        $profiles->city=$request->input('city');
        $profiles->subject=$request->input('subject');
        $profiles->charges=$request->input('charges');
        $profiles->tagline=$request->input('tagline');
        $profiles->job_type=$request->input('job_type');
        $profiles->personal_profile=$request->input('personal_profile');
        $profiles->gender=$request->input('gender');
        $profiles->profile_picture=$toupload; 
        $profiles->cover_letter=$tosave; 
        $profiles->cv=$tostore; 
        $profiles->video=$toadd;           
        
        
        if($profiles->save()){
            return redirect()->back()->with('status', 'successfully uploaded');
        }
        else{
        return redirect()->back()->with('status', 'operation failed');
    }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apisss;
use App\User;
use App\Http\Resources\UserResource as Usersource;

class ApisssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        return Usersource::collection($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone' => 'required|max:11|unique:users',
            'city' => 'required',
            'address' => 'required|string',            
            'role' => 'required|string',
            'password'=>'required|min:6',          
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'city'=>$request->city,
            'address'=>$request->address,
            'role'=>$request->role,
            'password'=> Hash::make($data['password']),
        ]);
        if($user->save()){
            return response()->json([
                'status'=> '200',
                'message'=>'successfully'
            ]);
            }else{
               
                return response()->json([
                    'status'=> '200',
                    'message'=>'successfully'
               
                ]);
        }
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($apisss)
    {
        $user=User::whereId($apisss)->first();
        //echo $apisss;
        if(!$user){
            return response()->json([
                'status' => '404',
                'message' => 'This user is not found in the database',
            ]);
        }
        return response()->json(
            [
                'status' => '200',
                'message' => 'successful',
                'result'=>[
                    'id'=>$user->id,
                    'name'=>$user->name,
                    'email'=>$user->email,
                ]

            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // code for login api    
    public function login(Request $request)
    {
        if((\Auth::attempt(['email'=>request('email'), 'password'=>request('password')]))){

            return response()->json([
                'status'=>200,
                'message'=>'Login Was Successful, Welcome to Discover Tutor'
            ]);
        } 
        else{
    return response()->json([
        'status'=>400,
        'message'=>'You do not Have an Account Yet, Please Sign up'
    ]);
    
    }
}


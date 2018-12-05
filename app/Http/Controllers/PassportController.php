<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function details(){
        return response()->json(['user'=>user::all()], 200);
    }

    public function login(Request $request){
        $credentials=[
        
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(auth()->attempt($credentials)){
            $token=auth()->user()->createToken('DiscoverTutor')->accessToken;
            return response()->json(['token'=>$token], 200);            
        }else{
            return response()->json(['error'=>'UnAuthorised'], 401);            
        }
    }

    public function register(Request $request)
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
            'password'=>bcrypt($request->password)
        ]);
        $token=$user->createToken('DiscoverTutor')->accessToken;
        if(user()->save($user))
        return response()->json([
            'success'=>true,
            'data'=>$user->toArray(),
            'token'=>$token], 200); 
        else
            return response()->json([
                'success'=>false,
                'message'=>'User not registered'
            ], 500);
    }

    public function update(Request $request, $id){
        $user = auth()->user()->find($id);
        if(!$user){
            return response()->json([
                'success'=>false,
                'message'=>'user with id' . $id . 'not found'
            ], 400);
        }
        $updated=$user->fill($request->all())->save();
        if($updated)
            return response()->json([
                'success'=>true
            ]);
            else
                return response()->json([
                    'success'=>false,
                    'message'=>'user details not updated',
                ], 500);
    }

    public function delete($id){
        $user=auth()->user()->find($id);
        if(!$user)
        {
            return response()->json([
                'success'=>false,
                'message'=>'user with id' . $id . 'not found'
            ], 400);
        }
       
        if($user->delete()){
            return response()->json([
                'success'=>true
            ]);
        } else{
                return response()->json([
                    'success'=>false,
                    'message'=>'user could not be deleted',
                ], 500);
            }

    }

    public function index(){
        $user = auth()->user();
        return response()->json([
            'success'=>true,
            'data'=>$products
        ]);
    }

    public function show($id){
        $user = auth()->user()->find($id);
        if(!$user){
            return response()->json([
                'success'=>false,
                'message'=>'user not found',
            ], 400);
        }
        return response()->json([
            'success'=>true,
            'data'=>$user->toArray()
        ], 200);
    }
}

<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends BaseController
{

    public function signin(Request $request)
    {
        Log::info("masuk signin");
        Log::info("request ". $request);
        parse_str($request, $output);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            Log::info("1");
            $authUser = Auth::user(); 
            Log::info("2");
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken; 
            Log::info("3");
            $success['name'] =  $authUser->name;
            Log::info("4");
   
            return $this->sendResponse($success, 'User signed in');
        } 
        else{ 
            Log::info("5");
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User created successfully.');
    }
   
}
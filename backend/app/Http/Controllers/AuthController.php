<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

    // user login
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $data = [];
        //Crean token
        try {

            if (!$token = auth()->attempt($credentials)) {
                return $this->sendError(__('Login credentials are invalid.'), [], config('constant.LOGIN_FAILED'));
            }
            
            $data['access_token'] = $token;
            $data['user'] = Auth::user();
            

        } catch (\Exception $e) {
            dd($e->getMessage());
            return $this->sendError(__('Could not create token.'), [], config('constant.LOGIN_FAILED'));
        }

        return $this->sendResponse($data, __('Login successfully'), config('constant.LOGIN_SUCCESS'));
    }


    // user signup
    public function userSignup(SignUpRequest $request){
        $inputData = $request->all();
        $userservice = new UserService;

        $message = __("User signup failed.");
        $code = config('constant.USER_SIGNUP_FAILED');
        try{
            if($data = $userservice->addNewUser($inputData)){
                $message = __("User signup success.");
                $code = config('constant.USER_SIGNUP_SUCCESS');
                
                $email_subject = __("Signup successful"); // Email Subject
                $from = "test@example.com"; // From Email
                $attachment = "";
                $template = "Email.signup"; // Email template
                $emailData = [];

                // send email
                $this->sendEmail($emailData,$email_subject,$from,$attachment,$template,$inputData['email']);
            }
        }catch(\Exception $ex){
            //dd($ex->getMessage());
        }
        
        return $this->sendResponse($data,$message,$code);
    }

    public function getAuthUser(){
        $message = "Successfully get data.";
        $data = auth()->user();
        $data['access_token'] = request()->bearerToken();
        return $this->sendResponse($data,$message,config('constant.AUTH_USER_SUCCESS'));
    }

    public function logout()
    {
        auth()->logout();
        $message = "Successfully logged out.";
        return $this->sendResponse([],$message,config('constant.USER_LOGOUT_SUCCESS'));
    }
    
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Admin;
use App\Blogger;
use App\Http\Controllers\Api\BaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users|email',
            'name' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        $success['email'] = $user->email;
        $success['password'] = $user->password;
        return $this->sendResponse($success, 'User created successfully');
    }

    public function registerAdmin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'unique:users|email',
            'name' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Admin::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        $success['email'] = $user->email;
        $success['password'] = $user->password;
        return $this->sendResponse($success, 'Admin created successfully');

    }

    public function registerBlogger(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'unique:users|email',
            'name' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Blogger::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        $success['email'] = $user->email;
        $success['password'] = $user->password;
        return $this->sendResponse($success, 'Blogger created successfully');
    }

}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Services\MessageService;
use App\Services\API\UserService;

class UserController extends Controller
{

    private $userServ;

    public function __construct()
    {
        $this->userServ = new UserService;
    }


    public function getPass(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $response = Http::asForm()->post(url('/oauth/token'), [
            'grant_type' => 'password',
            'client_id' => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'username' => $request->email,
            'password' => $request->password,
            'phone_number' => null,
            'scope' => '',
        ]);

        if($response->ok())
        {
            $data = $response->object();
            $user = Http::withHeaders([
                'Authorization' => 'Bearer ' . $data->access_token,
            ])->get(url('/api/user'));
            $data->user = $user->object();

            return response()->json($data,200);
        }

        return response()->json(['message'=>'Invalid email or password'],422);

    }

    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);


        if ($validator->fails()) {
            $response = response()->json($validator->errors(), 422,['Content-type'=>'application/json;charset=utf-8'],JSON_UNESCAPED_UNICODE);

            return $response;
        }

        $userRep = new UserRepository();
        $userRep->create($request->all());

        return response()->json([
            'message' => 'Verify Your Phone Number'
        ], 200);


    }

    public function registerPhone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required'
        ]);

        if ($validator->fails()) {
            $response = response()->json($validator->errors(), 422,['Content-type'=>'application/json;charset=utf-8'],JSON_UNESCAPED_UNICODE);

            return $response;
        }

        $rnd = rand(1000,9999);
        \Cache::put($request->phone_number, $rnd, $seconds = 300);

        $m = new MessageService();
        $m->sendSMS($request->phone_number,$rnd);
        return response()->json([
            'message' => 'Check Your Phone, after 5 minutes the code disappears',
            'phone_number' => $request->phone_number
        ], 200);


    }

    public function checkPhone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required',
            'code' => 'required'
        ]);

        if ($validator->fails()) {
            $response = response()->json($validator->errors(), 422,['Content-type'=>'application/json;charset=utf-8'],JSON_UNESCAPED_UNICODE);

            return $response;
        }

        $value = \Cache::get($request->phone_number);

        if($value && $value == $request->code)
        {
           $u = Auth::user()->update(['phone_number'=> $request->phone_number]);

           return response()->json([
            'message' => 'Your Phone Number Saved Success',
            'phone_number' => $request->phone_number
            ], 200);
        }

        return response()->json([
            'message' => 'Incorrect Code',
            'phone_number' => $request->phone_number
            ], 422);
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email',
            'name' => 'nullable|string',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'phone_number' => 'nullable|integer',
            'avatar' => 'nullable|image'
        ]);

        if ($validator->fails() || !count($request->all())) {
            return response()->json($validator->errors(), 422);
        }


        $this->userServ->update($request->all());

        return response()->json([
            'message' => 'Success'
        ], 200);
    }



}

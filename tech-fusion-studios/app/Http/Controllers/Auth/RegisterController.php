<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return User
     */
    public function register(Request $request)
    {
        $this->redirectTo = $request->input('route');

        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new \App\Models\User();
        $user->first_name = $request->input('firstname');
        $user->last_name = $request->input('lastname');
        $user->full_name = $request->input('fullname');
        $user->username = $this->createUsername($request->input('firstname'), $request->input('lastname'));
        $user->email = $request->input('email');
        $user->avatar = 'no-photo.png';
        $user->password = bcrypt($request->input('password'));
        $user->security_token = bcrypt(str_random(32));
        $user->save();
        $user->roles()->attach(Role::where('name', 'Newbie')->first());

        /*$user = User::create([
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'full_name' => $request->input('fullname'),
            'username' => $this->createUsername($request->input('firstname'), $request->input('lastname')),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'security_token' => bcrypt(str_random(32)),
        ]);*/

        $this->guard()->login($user);

        /*$userRole = UserRole::create([
            'user_id' => $user->id,
            'role_id' => 4,
        ]);*/

        return $this->registered($request, $user)
            ?: redirect()->intended($this->redirectPath())->with('alert-success', 'Your profile was created successfully! Please confirm your email with the link we sent to the address you provided.');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }

    protected function createUsername($firstname, $lastname)
    {
        $end = false;
        $i = 1;
        $username = substr($firstname, 0, 3) . substr($lastname, 0, 3) . $i;

        while ($end == false)
        {
            $check = User::where('username', $username)->count();
            if ($check >= 1) {
                $i++;
            } else {
                $end = true;
            }
        }

        return strtolower($username);
    }
}

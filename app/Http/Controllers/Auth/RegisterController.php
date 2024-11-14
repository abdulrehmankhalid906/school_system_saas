<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Date;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $date = new DateTime();
        $base_year = $date->format('Y');

        return DB::transaction(function () use ($data, $base_year) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
    
            School::create([
                'user_id' => $user->id,
                'name' => $user->name.' School',
                'founded_date' => now(),
                'address' => 'Islamabad, Pakisan',
                'district' => 'Fedral',
                'city' => 'Islamabad',
                'postal_code' => 'TR-'.$user->id,
                'phone' => '0300'.$user->id.'903432',
                'email' => $user->email,
                'website' => NULL,
                'registration_number' => 'REG-'.$base_year.'-'.$user->id,
                'established_year' => \Faker\Factory::create()->year,
            ]);
    
            // $user->syncRoles('Company'); For now commented
            return $user;
        });
    }
}

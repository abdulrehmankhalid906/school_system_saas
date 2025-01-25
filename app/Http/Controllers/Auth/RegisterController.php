<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\InitS;
use App\Models\User;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
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
            'name' => ['required', 'string', 'max:30'],
            'school_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
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
        $baseYear = now()->year;

        return DB::transaction(function () use ($data, $baseYear) {
            $school = School::create([
                'name' => $data['school_name'],
                'founded_date' => now(),
                'address' => $data['address'] ?? 'Default Address',
                'district' => $data['district'] ?? 'Default District',
                'city' => $data['city'] ?? 'Default City',
                'phone' => $data['phone'] ?? '0300' . rand(1000, 9999),
                'email' => $data['email'],
                'website' => $data['website'] ?? null,
                'payment_status' => 'paid',
                'status' => 'active',
                'registration_number' => 'REG-' . $baseYear . '-' . rand(1000, 9999),
                'established_year' => $baseYear,
            ]);

            $subscription = Subscription::create([
                'school_id' => $school->id,
                'start_date' => InitS::currentDate(),
                'end_date' => now()->addDays(30),
                'duration' => '30 Days',
                'status' => 'paid',
            ]);

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'school_id' => $school->id,
            ]);

            $user->syncRoles('School');

            return $user;
        });
    }
}

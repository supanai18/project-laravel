<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run(Request $request)
    {
        $request['name'] = 'admin';
        $request['email'] = 'admin@training.com';
        $request['password'] = 'admin123456';

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'status' => 'admin',
            'provider' => 'webapp',
            'provider_id' => 'webapp12345',
            'avatar' => env('APP_URL_IMAGE')
        ]);
    }
}

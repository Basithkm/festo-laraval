<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user =new  User;
        $user->name='admin';
        $user->email='admin@gmail.com';
        $user->username='admin@gmail.com';
        $user->mobile='99995555789';
        $user->password=Hash::make('12345678');
        $user->save();
        
    }
}

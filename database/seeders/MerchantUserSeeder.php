<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MerchantUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // अगर email पहले से है तो update होगा, वरना नया create होगा
        User::updateOrCreate(
            ['email' => 'siddhantram67@gmail.com'], // check condition
            [
                'name'              => 'Merchant Siddhant',
                'username'          => 'siddhant',
                'role'              => 'merchant', // ध्यान रहे कि DB में role column मौजूद हो
                'password'          => Hash::make('Siddhant@1234#'),
                'email_verified_at' => now(),
            ]
        );
    }
}

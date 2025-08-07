<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Merchant;

class MerchantSeeder extends Seeder
{
    public function run(): void
    {
        Merchant::create([
            'id' => 22315,
            'name' => 'Oak Bakeshop',
            'status' => 'Active',
            'address' => '130 Cypress Street, Providence, RI 02906',
            'pw_protected' => true,
            'active_square' => true,
            'apple_pay' => true,
            'apple_login' => true,
            'google_login_ios' => true,
            'google_login_android' => false,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::truncate();

        Member::create([
            'name' => '会員メンバー',
            'email' => 'member@member.member',
            'password' => Hash::make('password'),
            'name_kana' => 'ヤマダハナコ',
            'phone' => '09011223344',
            'postcode' => '01234567',
            'address' => '東京都千代田区神田町1-2',
            
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'first_name' => 'Paul',
                'last_name' => 'White',
                'birthdate' => '1996-11-21',
                'report_subject' => 'bhgtvf',
                'country' => 'Ireland',
                'phone' => '1234567890',
                'email' => 'pw@gmail.com',
                'company' => '',
                'position' => '',
                'about_me' => '',
                'photo' => '',
                'hidden' => true,
            ],
            [
                'first_name' => 'John',
                'last_name' => 'Terry',
                'birthdate' => '1998-02-12',
                'report_subject' => 'cvfgbth',
                'country' => 'Australia',
                'phone' => '9876543210',
                'email' => 'jt@gmail.com',
                'company' => 'hgfvb',
                'position' => '',
                'about_me' => '',
                'photo' => '',
                'hidden' => true,
            ],
        ]);
    }
}

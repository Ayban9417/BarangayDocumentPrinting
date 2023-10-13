<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Manila');
        
        DB::table('barangays')->insert([
            'id' => '1001',
            'barangay' => 'P-1',
            'municipality' => 'Kitaotao',
            'province' => 'Bukidnon',
            'postal_id' => '2811',
            'phone_number' => NULL,
            'email_add' => NULL,
            'image' => 'male.jpg',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('barangays')->insert([
            'barangay' => 'P-2',
            'municipality' => 'Kitaotao',
            'province' => 'Bukidnon',
            'postal_id' => '2811',
            'phone_number' => NULL,
            'email_add' => NULL,
            'image' => 'male.jpg',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('barangays')->insert([
            'barangay' => 'P-3',
            'municipality' => 'Kitaotao',
            'province' => 'Bukidnon',
            'postal_id' => '2811',
            'phone_number' => NULL,
            'email_add' => NULL,
            'image' => 'male.jpg',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('barangays')->insert([
            'barangay' => 'P-4',
            'municipality' => 'Kitaotao',
            'province' => 'Bukidnon',
            'postal_id' => '2811',
            'phone_number' => NULL,
            'email_add' => NULL,
            'image' => 'male.jpg',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('barangays')->insert([
            'barangay' => 'P-5',
            'municipality' => 'Kitaotao',
            'province' => 'Bukidnon',
            'postal_id' => '2811',
            'phone_number' => NULL,
            'email_add' => NULL,
            'image' => 'male.jpg',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('barangays')->insert([
            'barangay' => 'P-6',
            'municipality' => 'Kitaotao',
            'province' => 'Bukidnon',
            'postal_id' => '2811',
            'phone_number' => NULL,
            'email_add' => NULL,
            'image' => 'male.jpg',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('barangays')->insert([
            'barangay' => 'P-7',
            'municipality' => 'Kitaotao',
            'province' => 'Bukidnon',
            'postal_id' => '2811',
            'phone_number' => NULL,
            'email_add' => NULL,
            'image' => 'male.jpg',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);

        DB::table('barangays')->insert([
            'barangay' => 'P-8',
            'municipality' => 'Kitaotao',
            'province' => 'Bukidnon',
            'postal_id' => '2811',
            'phone_number' => NULL,
            'email_add' => NULL,
            'image' => 'male.jpg',
            'created_at'=> now(),
		    'updated_at'=> now()
        ]);
        
    }
}
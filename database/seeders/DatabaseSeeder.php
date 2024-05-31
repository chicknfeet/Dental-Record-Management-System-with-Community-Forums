<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelPatientlists;

use App\Models\Admin;
use App\Models\Patientlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Admin::factory()->create();

        // \App\Models\Admin::factory()->create([
        //     'name' => 'Administrator',
        //     'username' => 'admin',
        // ]);



        Patientlist::truncate();

        Patientlist::create([
            'name' => 'Patientlist 1',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 2',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 3',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 4',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 5',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 6',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 7',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 8',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 9',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 10',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 10',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 11',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 12',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 13',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 14',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 15',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 16',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 17',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 18',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 19',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 20',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);

        Patientlist::create([
            'name' => 'Patientlist 21',
            'gender' => 'male',
            'age' => 22,
            'email' => 'example@gmail.com',
            'phone' => '09123456789',
            'address' => 'Address 1',
        ]);
    }
}

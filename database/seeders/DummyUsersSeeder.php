<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            [
                'nama_admin'=>'Haidar',
                'username'=>'haidarrk',
                'password'=>bcrypt('haidar123'),
                'telp'=>'081123456789',
                'role'=>'super admin',
            ],
            [
                'nama_admin'=>'Anwar',
                'username'=>'anwarf',
                'password'=>bcrypt('anwar123'),
                'telp'=>'081234567890',
                'role'=>'admin tenant 1',
            ],
            [
                'nama_admin'=>'Ramdhani',
                'username'=>'ramdhanida',
                'password'=>bcrypt('ramdhani123'),
                'telp'=>'081987654321',
                'role'=>'admin tenant 2',
            ]
        ];

        foreach($adminData as $key => $val){
            User::create($val);
        }
    }
}

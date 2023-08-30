<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\Hero;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $heroes = [  
            ['slide'=>1,'label' => 'Kategori Baru nih','deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque neque, maxime debitis nostrum rerum iure? Dolorum eos molestias rem molestiae.','image'=>''],
            ['slide'=>2,'label' => 'Produk Baru nih','deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque neque, maxime debitis nostrum rerum iure? Dolorum eos molestias rem molestiae.','image'=>''],
            ['slide'=>3,'label' => 'Diskon Baru nih','deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque neque, maxime debitis nostrum rerum iure? Dolorum eos molestias rem molestiae.','image'=>''],
        ];
        foreach($heroes as $hero){
            Hero::create([
                'slide' => $hero['slide'],
                'label' => $hero['label'],
                'deskripsi' => $hero['deskripsi'],
                'image' => $hero['image'],
            ]);
        }
        Contact::create([
            'phone' => '6287829496765',
            'email' => 'mads@gmail.com',
            'city' => 'Cianjur',
            'province' => 'Jawa Barat',
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'mads@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Customer',
            'email' => 'cust@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);
    }
}

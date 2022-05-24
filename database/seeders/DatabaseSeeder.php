<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::create([
            'name' => 'Isardi Dama Iraga',
            'email' => 'isardidamairaga27@gmail.com',
            'isAdmin'=> true,
            'password' => Hash::make("Isardi27") 
        ]);
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'isAdmin'=> true,
            'password' => Hash::make("admin") 
        ]);

        \App\Models\User::create([
            'name' => 'Alwan Fauzul Azhim Kustiwa',
            'email' => 'alwanfa@gmail.com',
            'isAdmin'=> true,
            'password' => Hash::make("kosongan") 
        ]);

        \App\Models\User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'isAdmin'=> false,
            'password' => Hash::make("12345678") 
        ]);

    


        \App\Models\Category::create([
            'name' => 'Komik',
            "slug" => "komik"
        ]);
        \App\Models\Category::create([
            'name' => 'Novel',
            'slug' => 'novel'
        ]);
        \App\Models\Category::create([
            'name' => 'Journal',
            'slug' => 'journal'
        ]);
        \App\Models\Category::create([
            'name' => 'Ensiklopedia',
            'slug' => 'ensiklopedia'
        ]);

        \App\Models\Category::create([
            'name' => 'Biografi',
            'slug' => 'biografi'
        ]);

        \App\Models\Category::create([
            'name' => 'Cerpen',
            'slug' => 'cerpen'
        ]);
        \App\Models\Category::create([
            'name' => 'Puisi',
            'slug' => 'puisi'
        ]);
        \App\Models\Category::create([
            'name' => 'Pantun',
            'slug' => 'pantun'
        ]);
     
        
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SourceCode;
use App\Models\SupportingDocument;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Admin'
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'User'
        ]);

        Category::create([
            'name' => 'Website'
        ]);
        
        Category::create([
            'name' => 'Mobile'
        ]);

        SourceCode::create([
            'name' => 'Belajar Laravel 8',
            'category_id'=> 1,
            'link'=> 'https://github.com/',
            'version'=> '4',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, quisquam.',
            'image'=> 'file-dummy/laravel8.jpg',
            'file_zip'=> 'file-source-codes/RGUWqGUXr8Vsl9gGcmwxvNpjz0Krg1rBWH0pRbL4.zip',
            
        ]);

        SourceCode::create([
            'name' => 'Belajar HTML5',
            'category_id'=> 2,
            'link'=> 'https://github.com/',
            'version'=> '4',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, quisquam.',
            'image'=> 'file-dummy/html5.jpg',
            'file_zip'=> 'file-source-codes/RGUWqGUXr8Vsl9gGcmwxvNpjz0Krg1rBWH0pRbL4.zip',
        ]);

        Video::create([
            "name" => "1. Apa itu HTML5?",
            "link" => "Q2VqCG13ejA",
            "description" => "Mari kita mulai belajar mengenai HTML5",
            "source_code_id" => 2
        ]);
        Video::create([
            "name" => "2. Semantic HTML5?",
            "link" => "o3m15BWi2HM",
            "description" => "Penjelasan mengenai Semantic HTML5",
            "source_code_id" => 2
        ]);
        
        Video::create([
            "name" => "1. Intro",
            "link" => "HqAMb6kqlLs",
            "description" => "Kali ini kita akan memulai seri baru untuk belajar Laravel 8.. Let's Go!",
            "source_code_id" => 1
        ]);
        Video::create([
            "name" => "2. Instalasi & Konfigurasi",
            "link" => "pZqk57Xvujs",
            "description" => "Menginstall laravel 8 pada sistem operasi MacOS dan Windows",
            "source_code_id" => 1
        ]);
        Video::create([
            "name" => "3. Struktur Folder, Routes & View",
            "link" => "u7zS2XpMpsc",
            "description" => "Mempelajari struktur folder, routes dan view pada laravel 8",
            "source_code_id" => 1
        ]);
        Video::create([
            "name" => "4. Blade Templating Engine",
            "link" => "9jrD0wcfq1g",
            "description" => "Mengenal fitur Blade Templating Engine pada laravel 8",
            "source_code_id" => 1
        ]);
        Video::create([
            "name" => " 5. Model, Collection & Controller",
            "link" => "ptWgufbjURA",
            "description" => "Membahas mengenai komponen Model & Controller",
            "source_code_id" => 1
        ]);

        SupportingDocument::create([
            "name" => "Design UI",
            "description" => "safaafasfaf",
            "source_code_id" => 1,
            "file" => "supporting-documents/IUmxMUd7rg6Mj3mh9grYhtbo9bvQrydVYkMYLsgg.pdf",
        ]);
        SupportingDocument::create([
            "name" => "Design Diagram UML",
            "description" => "safaafasfaf",
            "source_code_id" => 1,
            "file" => "supporting-documents/IUmxMUd7rg6Mj3mh9grYhtbo9bvQrydVYkMYLsgg.pdf",
        ]);
        SupportingDocument::create([
            "name" => "Design Prototype",
            "description" => "safaafasfaf",
            "source_code_id" => 2,
            "file" => "supporting-documents/IUmxMUd7rg6Mj3mh9grYhtbo9bvQrydVYkMYLsgg.pdf",
        ]);
    }
}

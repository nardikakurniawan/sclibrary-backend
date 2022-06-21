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
            'name' => 'Facebook Web',
            'category_id'=> 1,
            'link'=> 'https://github.com/',
            'version'=> '4',
            'date'=> '2022-06-21 05:20:15',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, quisquam.',
            'image'=> 'img-source-codes/OiTY7rt6HLfhn9O80ZzQtHZ2E8h0rmAZhKhLTTgA.webp',
            'file_zip'=> 'file-source-codes/RGUWqGUXr8Vsl9gGcmwxvNpjz0Krg1rBWH0pRbL4.zip',
            'file_ebook'=> 'ebooks/Dhu2SWmtf525yHyoIdDW6h6SvyKHuwPWa94mACF0.pdf',
        ]);

        SourceCode::create([
            'name' => 'Game Mobile Legend',
            'category_id'=> 2,
            'link'=> 'https://github.com/',
            'version'=> '4',
            'date'=> '2022-06-21 05:20:15',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, quisquam.',
            'image'=> 'img-source-codes/OiTY7rt6HLfhn9O80ZzQtHZ2E8h0rmAZhKhLTTgA.webp',
            'file_zip'=> 'file-source-codes/RGUWqGUXr8Vsl9gGcmwxvNpjz0Krg1rBWH0pRbL4.zip',
            'file_ebook'=> 'ebooks/Dhu2SWmtf525yHyoIdDW6h6SvyKHuwPWa94mACF0.pdf',
        ]);

        Video::create([
            "name" => "Video 1",
            "link" => "sasadadadasd",
            "description" => "ASBDJABasdaaDJANDANDSA",
            "source_code_id" => 2
        ]);
        Video::create([
            "name" => "Video 2",
            "link" => "sasadadadasd",
            "description" => "ASBDJABasdaaDJANDANDSA",
            "source_code_id" => 2
        ]);
        Video::create([
            "name" => "Video 3",
            "link" => "sasadadadasd",
            "description" => "ASBDJABasdaaDJANDANDSA",
            "source_code_id" => 2
        ]);
        Video::create([
            "name" => "Pengertian PHP",
            "link" => "sasadadadasd",
            "description" => "ASBDJABasdaaDJANDANDSA",
            "source_code_id" => 1
        ]);
        Video::create([
            "name" => "Install PHP",
            "link" => "sasadadadasd",
            "description" => "ASBDJABasdaaDJANDANDSA",
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

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
            'name' => 'Jova Software',
            'category_id'=> 1,
            'link'=> 'https://www.jovasoftware.com/',
            'version'=> '1',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis recusandae eius vero iste neque sed sit omnis, debitis quam voluptatem, ducimus minus ipsam vitae. Facilis, nulla modi laboriosam nam ipsa natus adipisci ea, saepe unde aspernatur veniam! Necessitatibus autem cum architecto facilis quam eum maiores dolor quidem! Voluptatum, voluptatem nesciunt?',
            'image'=> 'file-dummy/jova-software.PNG',
            'file_zip'=> 'file-dummy/example-software.zip',
        ]);
        SourceCode::create([
            'name' => 'PMI Batam',
            'category_id'=> 1,
            'link'=> 'https://pmibatam.or.id/',
            'version'=> '1',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis recusandae eius vero iste neque sed sit omnis, debitis quam voluptatem, ducimus minus ipsam vitae. Facilis, nulla modi laboriosam nam ipsa natus adipisci ea, saepe unde aspernatur veniam! Necessitatibus autem cum architecto facilis quam eum maiores dolor quidem! Voluptatum, voluptatem nesciunt?',
            'image'=> 'file-dummy/pmi-batam.PNG',
            'file_zip'=> 'file-dummy/example-software.zip',
        ]);
        SourceCode::create([
            'name' => 'Kitakerja ',
            'category_id'=> 1,
            'link'=> 'https://www.kitakerja.com/',
            'version'=> '1',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis recusandae eius vero iste neque sed sit omnis, debitis quam voluptatem, ducimus minus ipsam vitae. Facilis, nulla modi laboriosam nam ipsa natus adipisci ea, saepe unde aspernatur veniam! Necessitatibus autem cum architecto facilis quam eum maiores dolor quidem! Voluptatum, voluptatem nesciunt?',
            'image'=> 'file-dummy/kita-kerja.PNG',
            'file_zip'=> 'file-dummy/example-software.zip',
        ]);
        SourceCode::create([
            'name' => 'Rumahdewi',
            'category_id'=> 1,
            'link'=> 'https://www.rumahdewi.com/',
            'version'=> '1',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus non maiores! Odit itaque assumenda provident nisi molestias, quasi tempore labore quos? Architecto recusandae corrupti sit eligendi aliquid ut fuga!',
            'image'=> 'file-dummy/rumah-dewi.PNG',
            'file_zip'=> 'file-dummy/example-software.zip',
        ]);
        SourceCode::create([
            'name' => 'STIE Bentara',
            'category_id'=> 1,
            'link'=> 'https://www.stiebpbatam.ac.id/',
            'version'=> '1',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus non maiores! Odit itaque assumenda provident nisi molestias, quasi tempore labore quos? Architecto recusandae corrupti sit eligendi aliquid ut fuga!',
            'image'=> 'file-dummy/stie-bintara.PNG',
            'file_zip'=> 'file-dummy/example-software.zip',
        ]);
        SourceCode::create([
            'name' => 'Piposmart Laundry',
            'category_id'=> 2,
            'link'=> 'https://www.piposmartlaundry.com/',
            'version'=> '1',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, quisquam.',
            'image'=> 'file-dummy/pipo-smart.PNG',
            'file_zip'=> 'file-dummy/example-software.zip',
        ]);
        SourceCode::create([
            'name' => 'Pindolab',
            'category_id'=> 2,
            'link'=> 'https://www.pindolab.com/',
            'version'=> '1',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusamus non maiores! Odit itaque assumenda provident nisi molestias, quasi tempore labore quos? Architecto recusandae corrupti sit eligendi aliquid ut fuga!',
            'image'=> 'file-dummy/pindolab.PNG',
            'file_zip'=> 'file-dummy/example-software.zip',
        ]);
        SourceCode::create([
            'name' => 'Agraha Dana',
            'category_id'=> 2,
            'link'=> '',
            'version'=> '1',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, quisquam.',
            'image'=> 'file-dummy/agraha-dana.PNG',
            'file_zip'=> 'file-dummy/example-software.zip',
        ]);

        SourceCode::create([
            'name' => 'Belajar Laravel 8',
            'category_id'=> 1,
            'link'=> 'https://github.com/',
            'version'=> '4',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, quisquam.',
            'image'=> 'file-dummy/laravel8.jpg',
            'file_zip'=> 'file-dummy/RGUWqGUXr8Vsl9gGcmwxvNpjz0Krg1rBWH0pRbL4.zip',
            
        ]);

        SourceCode::create([
            'name' => 'Belajar HTML5',
            'category_id'=> 2,
            'link'=> 'https://github.com/',
            'version'=> '4',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, quisquam.',
            'image'=> 'file-dummy/html5.jpg',
            'file_zip'=> 'file-dummy/RGUWqGUXr8Vsl9gGcmwxvNpjz0Krg1rBWH0pRbL4.zip',
        ]);

        Video::create([
            "name" => "1. Apa itu HTML5?",
            "link" => "Q2VqCG13ejA",
            "description" => "Mari kita mulai belajar mengenai HTML5",
            "source_code_id" => 10
        ]);
        Video::create([
            "name" => "2. Semantic HTML5?",
            "link" => "o3m15BWi2HM",
            "description" => "Penjelasan mengenai Semantic HTML5",
            "source_code_id" => 10
        ]);
        
        Video::create([
            "name" => "1. Intro",
            "link" => "HqAMb6kqlLs",
            "description" => "Kali ini kita akan memulai seri baru untuk belajar Laravel 8.. Let's Go!",
            "source_code_id" => 9
        ]);
        Video::create([
            "name" => "2. Instalasi & Konfigurasi",
            "link" => "pZqk57Xvujs",
            "description" => "Menginstall laravel 8 pada sistem operasi MacOS dan Windows",
            "source_code_id" => 9
        ]);
        Video::create([
            "name" => "3. Struktur Folder, Routes & View",
            "link" => "u7zS2XpMpsc",
            "description" => "Mempelajari struktur folder, routes dan view pada laravel 8",
            "source_code_id" => 9
        ]);
        Video::create([
            "name" => "4. Blade Templating Engine",
            "link" => "9jrD0wcfq1g",
            "description" => "Mengenal fitur Blade Templating Engine pada laravel 8",
            "source_code_id" => 9
        ]);
        Video::create([
            "name" => " 5. Model, Collection & Controller",
            "link" => "ptWgufbjURA",
            "description" => "Membahas mengenai komponen Model & Controller",
            "source_code_id" => 9
        ]);

        SupportingDocument::create([
            "name" => "Ebook",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsam.",
            "source_code_id" => 9,
            "file" => "file-dummy/ebook-laravel.pdf",
        ]);
        SupportingDocument::create([
            "name" => "Design UI",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsam.",
            "source_code_id" => 9,
            "file" => "file-dummy/ebook-laravel.pdf",
        ]);
        SupportingDocument::create([
            "name" => "Design Diagram UML",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsam.",
            "source_code_id" => 9,
            "file" => "file-dummy/ebook-laravel.pdf",
        ]);
        SupportingDocument::create([
            "name" => "Ebook",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsam.",
            "source_code_id" => 10,
            "file" => "file-dummy/ebook-html.pdf",
        ]);
        SupportingDocument::create([
            "name" => "Design Prototype",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsam.",
            "source_code_id" => 10,
            "file" => "file-dummy/ebook-html.pdf",
        ]);
    }
}

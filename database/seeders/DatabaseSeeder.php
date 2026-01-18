<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Abimanyu Pradipa Wisnu',
            'username' => 'abimanyu',
            'role' => 'developer',
            'email'=> 'abimanyupw@gmail.com',
            'password' => Hash::make('Abimanyu237'),
            'remember_token' => Str::random(10),
            'phone' => '081234567890',
            'image' => ''
        ]);
        User::create([
            'name' => 'Hamdan Trisnawan',
            'username' => 'hamdan',
            'role' => 'admin',
            'email'=> 'hamdantr@gmail.com',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'phone' => '081234567891',
            'image' => ''
        ]);

        Course::create([
            
                'title' => 'Cyber Security',
                'slug' => 'cyber-security',
                'description' => 'Pelajari dasar-dasar keamanan siber, pertahanan jaringan, dan etika hacker untuk melindungi data.',
                'image' => 'cyber-logo.jpg' 

            ]);


              Course::create([
                'title' => 'IT Network Cabling',
                'slug' => 'it-network-cabling',
                'description' => 'Bangun fondasi jaringan yang kokoh dengan instalasi dan manajemen kabel yang presisi.',
                'image' => 'cabling-logo.jpg' 

            ]);


              Course::create([
                'title' => 'IT Network System Administration',
                'slug' =>'it-network-system-administration',
                'description' => 'Menguasai administrasi sistem dan jaringan, konfigurasi server, serta manajemen infrastruktur IT.',
                'image' => 'itnsa-logo.jpg' 

            ]);

            Category::create([
                'name' => 'Mikrotik',
                'slug' => 'mikrotik',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, cum!', 
                
            ]);
            Category::create([
                'name' => 'Linux Server',
                'slug' => 'linux-server',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, cum!', 
               
            ]);
            Category::create([
                'name' => 'Fiber Optik',
                'slug' => 'fiber-optik',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, cum!', 
               
            ]);
            Category::create([
                'name' => 'Cisco Packet Tracer',
                'slug' => 'cisco-packet-tracer',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, cum!', 
              
            ]);
            Category::create([
                'name' => 'Binary Exploitation',
                'slug' => 'binary-exploitation',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, cum!', 
              
            ]);


        
    }
}
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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



        DB::table('parents')->insert([
            [
                'name' => 'John Doe',
                'contact_number' => '123-456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'contact_number' => '987-654-3210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample data as needed
        ]);

        DB::table('students')->insert([
            [
                'name' => 'Alice Doe',
                'pwd' => password_hash('master123', PASSWORD_DEFAULT),
                'username' => 'alice-doe',
                'grade' => '12th',
                'parent_id' => 1, // Assuming John Doe's ID is 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Smith',
                'username' => 'bob-smith',
                'pwd' => password_hash('helloTz12', PASSWORD_DEFAULT),
                'grade' => '10th',
                'parent_id' => 2, // Assuming Jane Smith's ID is 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample data as needed
        ]);
    }
}

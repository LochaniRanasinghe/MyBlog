<?php

namespace Database\Seeders;

use App\Models\User;

use App\Models\Posts;
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
        // User::factory(1)->create();
        
        $user=User::factory()->create([
            'name'=>'John Doe',
            'email'=>'john@gmail.com',
        ]);
        
        Posts::factory(6)->create([
            'user_id'=>$user->id,
        ]);
    }
}
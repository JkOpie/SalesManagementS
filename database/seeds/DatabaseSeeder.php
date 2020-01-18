<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'name' => 'syaafi',
           'email' => 'syaafi@syaafi.com',
           'password' => bcrypt('12345678'),
       ]);

       factory(Product::class, 10)->create();


    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Blog\User;
use Blog\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();

        $user = new User;

        $user->name = 'Vaidas';
        $user->email = 'vuidaa@gmail.com';
        $user->password = bcrypt('123456');
        $user->is_admin = 1;
        $user->save();

        $category = new Category;
        $category->slug = 'sports';
        $category->category = 'Sports';
        $category->save();

        $category = new Category;
        $category->slug = 'nature';
        $category->category = 'Nature';
        $category->save();

        $category = new Category;
        $category->slug = 'politics';
        $category->category = 'Politics';
        $category->save();


        //Model::reguard();
    }
}

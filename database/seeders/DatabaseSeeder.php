<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(19)->create();

        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'i@test.com',
        ]);

        $categories = Category::factory(4)->create();

        $questions  = Question::factory(30)->create([
            'user_id'       => fn() => User::inRandomOrder()->first()->id, //fn() => es una consulta cada vez que se crea una pregunta para asignar un usuario aleatorio cada vez que se crea una pregunta
            'category_id'   => fn() => $categories->random()->id,
        ]);

        $answers  = Answer::factory(50)->create([
            'user_id'       => fn() => User::inRandomOrder()->first()->id, //fn() => es una consulta cada vez que se crea una pregunta para asignar un usuario aleatorio cada vez que se crea una pregunta
            'question_id'   => fn() => $questions->random()->id,
        ]);

        Comment::factory(100)->create([
            'user_id'       => fn() => User::inRandomOrder()->first()->id,
            'commentable_id'   => fn() => $answers->random()->id,
            'commentable_type' => fn() => Answer::class,
        ]);

        Comment::factory(100)->create([
            'user_id'       => fn() => User::inRandomOrder()->first()->id,
            'commentable_id'   => fn() => $questions->random()->id,
            'commentable_type' => fn() => Question::class,
        ]);



        // Comment::factory(100)->create([
        //     'user_id'       => fn() => User::inRandomOrder()->first()->id,
        //     'commentable_id'   => fn() => rand(0,1) ? $questions->random()->id : $answers->random()->id,
        //     'commentable_type' => fn() => rand(0,1) ? Question::class : Answer::class,
        // ]);

        Blog::factory(30)->create([
            'user_id'       => fn() => User::inRandomOrder()->first()->id, //fn() => es una consulta cada vez que se crea una pregunta para asignar un usuario aleatorio cada vez que se crea una pregunta
            'category_id'   => fn() => $categories->random()->id,
        ]);
    }
}

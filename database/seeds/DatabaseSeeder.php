<?php

use Illuminate\Database\Seeder;
use App\User;
use App\post;
use App\comments;


class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserDataSeeder');
        $this->call('PostDataSeeder');
        $this->call('CommentDataSeeder');
    }
}

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'id'=>'1',
            'first_name' => 'Daisy',
            'last_name' => 'Johnson',
            'email' => 'Daisy@gmail.com',
            'password' => '12345'
        ]);
        User::create([
            'id'=>'2',
            'first_name' => 'Jemma',
            'last_name' => 'Simmons',
            'email' => 'Jemma@gmail.com',
            'password' => '12345'
        ]);
        User::create([
            'id'=>'3',
            'first_name' => 'oliver',
            'last_name' => 'queen',
            'email' => 'oliver@gmail.com',
            'password' => '12345'
        ]);
    }
}

class PostDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        post::create([
            'id'=>'1',
            'post_title' => 'What is a StackOverflowError',
            'description' => 'Parameters and local variables are allocated on the stack (with reference types the object lives on the heap and a variable references that object). The stack typically lives at the upper end of your address space and as it is used up it heads towards the bottom of the address space (i.e. towards zero)',
            'user_id' => '1',
        ]);

        post::create([
            'id'=>'2',
            'post_title' => 'simple stock of libraray',
            'description' => 'I have an assignment to write a java program that maintains stock of a library shop using linked list data structure. the program support: 1. Load books details from a text file. Books details includes the following attributes separated by colon: Author(s) (Note: more than 1 author are separated by comma) Title Edition Publisher Price Quantity (available stock)n',
            'user_id' => '2',
        ]);

        post::create([
            'id'=>'3',
            'post_title' => 'What is a Null Pointer Exception, and how do I fix it',
            'description' => 'Parameters and local variables are allocated on the stack (with reference types the object lives on the heap and a variable references that object)',
            'user_id' => '1',
        ]);

        post::create([
            'id'=>'4',
            'post_title' => 'When should an IllegalArgumentException be thrown',
            'description' => 'So basically what I\'m saying is I don\'t see a meaningful consistent policy for the use of IllegalArgumentException. It seems it should not be used and we should stick to our own checked exceptions. What is a good use case to throw this?',
            'user_id' => '3',
        ]);
    }
}

class CommentDataSeeder extends Seeder
{

    public function run()
    {
        DB::table('comments')->delete();

        Comments::create([
            'id'=>'1',
            'comment' => 'ya its correct',
            'user_id' => '1',
            'post_id' => '1'
        ]);


        Comments::create([
            'id'=>'2',
            'comment' => 'When you declare a reference variable (i.e. an object) you are really creating a pointer to an object. Consider the following code where you declare a variable of primitive type',
            'user_id' => '1',
            'post_id' => '3'
        ]);


        Comments::create([
            'id'=>'3',
            'comment' => 'As you should know, Java types are divided into primitive types (boolean, int etc) and reference types. Reference types in Java allow you to use the special value null which is the Java way of saying "no object"',
            'user_id' => '2',
            'post_id' => '3'
        ]);


        Comments::create([
            'id'=>'4',
            'comment' => 'Calling the instance method of a null object',
            'user_id' => '3',
            'post_id' => '3'
        ]);
    }
}

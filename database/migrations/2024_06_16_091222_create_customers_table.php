<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        // Menambahkan 15 data customer
        DB::table('customers')->insert([
            ['name' => 'Customer 1', 'email' => 'customer1@example.com', 'password' => bcrypt('password1')],
            ['name' => 'Customer 2', 'email' => 'customer2@example.com', 'password' => bcrypt('password2')],
            ['name' => 'Customer 3', 'email' => 'customer3@example.com', 'password' => bcrypt('password3')],
            ['name' => 'Customer 4', 'email' => 'customer4@example.com', 'password' => bcrypt('password4')],
            ['name' => 'Customer 5', 'email' => 'customer5@example.com', 'password' => bcrypt('password5')],
            ['name' => 'Customer 6', 'email' => 'customer6@example.com', 'password' => bcrypt('password6')],
            ['name' => 'Customer 7', 'email' => 'customer7@example.com', 'password' => bcrypt('password7')],
            ['name' => 'Customer 8', 'email' => 'customer8@example.com', 'password' => bcrypt('password8')],
            ['name' => 'Customer 9', 'email' => 'customer9@example.com', 'password' => bcrypt('password9')],
            ['name' => 'Customer 10', 'email' => 'customer10@example.com', 'password' => bcrypt('password10')],
            ['name' => 'Customer 11', 'email' => 'customer11@example.com', 'password' => bcrypt('password11')],
            ['name' => 'Customer 12', 'email' => 'customer12@example.com', 'password' => bcrypt('password12')],
            ['name' => 'Customer 13', 'email' => 'customer13@example.com', 'password' => bcrypt('password13')],
            ['name' => 'Customer 14', 'email' => 'customer14@example.com', 'password' => bcrypt('password14')],
            ['name' => 'Customer 15', 'email' => 'customer15@example.com', 'password' => bcrypt('password15')]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};

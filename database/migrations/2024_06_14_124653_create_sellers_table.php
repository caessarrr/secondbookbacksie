<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamps();
        });

        DB::table('sellers')->insert([
            ['name' => 'Seller One', 'email' => 'seller1@example.com', 'password' => bcrypt('password1'), 'phone' => '1234567890', 'address' => 'Address 1', 'profile_photo' => 'profile_photo1.jpg'],
            ['name' => 'Seller Two', 'email' => 'seller2@example.com', 'password' => bcrypt('password2'), 'phone' => '1234567891', 'address' => 'Address 2', 'profile_photo' => 'profile_photo2.jpg'],
            ['name' => 'Seller Three', 'email' => 'seller3@example.com', 'password' => bcrypt('password3'), 'phone' => '1234567892', 'address' => 'Address 3', 'profile_photo' => 'profile_photo3.jpg'],
            ['name' => 'Seller Four', 'email' => 'seller4@example.com', 'password' => bcrypt('password4'), 'phone' => '1234567893', 'address' => 'Address 4', 'profile_photo' => 'profile_photo4.jpg'],
            ['name' => 'Seller Five', 'email' => 'seller5@example.com', 'password' => bcrypt('password5'), 'phone' => '1234567894', 'address' => 'Address 5', 'profile_photo' => 'profile_photo5.jpg']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};

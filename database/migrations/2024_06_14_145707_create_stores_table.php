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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('sellers')->onDelete('cascade');
            $table->string('store_name');
            $table->text('store_details')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamps();
        });

        // Menambahkan data toko untuk setiap seller
        DB::table('stores')->insert([
            ['seller_id' => 1, 'store_name' => 'Toko Buku A', 'store_details' => 'Toko buku di Jakarta'],
            ['seller_id' => 2, 'store_name' => 'Toko Buku B', 'store_details' => 'Toko buku di Bandung'],
            ['seller_id' => 3, 'store_name' => 'Toko Buku C', 'store_details' => 'Toko buku di Surabaya'],
            ['seller_id' => 4, 'store_name' => 'Toko Buku D', 'store_details' => 'Toko buku di Yogyakarta'],
            ['seller_id' => 5, 'store_name' => 'Toko Buku E', 'store_details' => 'Toko buku di Bali']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};

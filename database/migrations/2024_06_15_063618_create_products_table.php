<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('author')->nullable(); // Ubah agar author bisa nullable
            $table->string('isbn')->nullable();   // Ubah agar isbn bisa nullable
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->foreignId('category_id')->constrained('categories');
            $table->json('images');
            $table->timestamps();
        });

        // Menambahkan data buku untuk setiap toko
        DB::table('products')->insert([
            ['store_id' => 1, 'name' => 'Buku A1', 'description' => 'Deskripsi buku A1', 'author' => 'Penulis A1', 'isbn' => 'ISBN001A1', 'price' => 100000, 'stock' => 10, 'category_id' => 1, 'images' => json_encode(['image1.jpg', 'image2.jpg'])],
            ['store_id' => 1, 'name' => 'Buku A2', 'description' => 'Deskripsi buku A2', 'author' => 'Penulis A2', 'isbn' => 'ISBN001A2', 'price' => 150000, 'stock' => 5, 'category_id' => 2, 'images' => json_encode(['image3.jpg', 'image4.jpg'])],
            ['store_id' => 2, 'name' => 'Buku B1', 'description' => 'Deskripsi buku B1', 'author' => 'Penulis B1', 'isbn' => 'ISBN002B1', 'price' => 120000, 'stock' => 8, 'category_id' => 1, 'images' => json_encode(['image5.jpg', 'image6.jpg'])],
            ['store_id' => 2, 'name' => 'Buku B2', 'description' => 'Deskripsi buku B2', 'author' => 'Penulis B2', 'isbn' => 'ISBN002B2', 'price' => 180000, 'stock' => 7, 'category_id' => 2, 'images' => json_encode(['image7.jpg', 'image8.jpg'])],
            ['store_id' => 3, 'name' => 'Buku C1', 'description' => 'Deskripsi buku C1', 'author' => 'Penulis C1', 'isbn' => 'ISBN003C1', 'price' => 140000, 'stock' => 9, 'category_id' => 1, 'images' => json_encode(['image9.jpg', 'image10.jpg'])],
            ['store_id' => 3, 'name' => 'Buku C2', 'description' => 'Deskripsi buku C2', 'author' => 'Penulis C2', 'isbn' => 'ISBN003C2', 'price' => 160000, 'stock' => 6, 'category_id' => 2, 'images' => json_encode(['image11.jpg', 'image12.jpg'])],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

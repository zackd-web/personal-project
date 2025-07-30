<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->year('year');
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->integer('total_copies');
            $table->integer('available_stock');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
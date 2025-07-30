<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->foreignId('member_id')->constrained()->onDelete('cascade');
            $table->date('borrow_date');
            $table->date('due_date');
            $table->date('return_date')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan', 'terlambat'])->default('dipinjam');
            $table->enum('condition', ['sangat baik', 'baik', 'cukup', 'buruk', 'rusak'])->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('category_id')->nullable()->after('image'); // Add the category_id column

            // Add a foreign key constraint
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null'); // Set the category_id to null if the category is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};

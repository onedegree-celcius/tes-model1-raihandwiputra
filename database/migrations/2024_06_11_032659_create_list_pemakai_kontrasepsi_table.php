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
        Schema::create('public.list_pemakai_kontrasepsi', function (Blueprint $table) {
            $table->id('id_list');
            $table->foreignId('id_propinsi')->nullable()->references('id_propinsi')->on('public.list_propinsi')->onDelete('SET NULL');
            $table->foreignId('id_kontrasepsi')->nullable()->references('id_kontrasepsi')->on('public.list_kontrasepsi')->onDelete('SET NULL');
            $table->bigInteger('jumlah_pemakai');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public.list_pemakai_kontrasepsi');
    }
};

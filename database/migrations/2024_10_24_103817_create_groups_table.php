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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name',length:255);
            $table->string('slug',length:255);
            $table->string('cover_path',length:1024)->nullable();
            
            $table->string('thumbnail_path',length:1024);
           
            $table->boolean('auto_approval')->default(true );
            $table->text('about')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('deleted_at')->nullable();
            $table->foreignId('deleted_by')->constrained('users')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
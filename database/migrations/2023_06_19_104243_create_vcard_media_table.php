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
        Schema::create('vcard_media', function (Blueprint $table) {
            $table->id();
            $table->string('media_name')->nullable();
            $table->string('media_link')->nullable();

            $table->integer('vcard_id')->unsigned();
            $table->foreign('vcard_id')->references('id')->on('vcards')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vcard_media');
    }
};

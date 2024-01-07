<?php

use App\Enums\LisitingTypeEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('broker_id');
            $table->string('address');
            $table->enum('listing_type', [
                LisitingTypeEnum::OPEN->value,
                LisitingTypeEnum::SELL->value,
                LisitingTypeEnum::EXCLUSIVE->value,
                LisitingTypeEnum::NET->value
            ])->default(LisitingTypeEnum::OPEN->value);
            $table->string('city');
            $table->string('zip_code');
            $table->longText('description');
            $table->year('build_year');
            $table->timestamps();

            $table->foreign('broker_id')
                    ->references('id')
                    ->on('brokers')
                    ->onDelete('cascade');

            $table->unique(['address', 'zip_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
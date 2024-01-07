<?php

use App\Enums\PropertyTypeEnum;
use App\Enums\PropertyStatusEnum;
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
        Schema::create('property_characteristics', function (Blueprint $table) {
            $table->unsignedBigInteger('property_id')->unique();
            $table->float('price')->required();
            $table->integer('bedrooms')->required();
            $table->integer('bathrooms')->required();
            $table->float('sqft')->required();
            $table->float('price_sqft')->required();

            $table->enum('property_type', [
                PropertyTypeEnum::SINGLE->value,
                PropertyTypeEnum::TOWNHOUSE->value,
                PropertyTypeEnum::MULTIFAMILY->value,
                PropertyTypeEnum::BUNGALOW->value
            ]);

            $table->enum('status', [
                PropertyStatusEnum::SOLD->value,
                PropertyStatusEnum::SALE->value,
                PropertyStatusEnum::HOLD->value
            ])->required();

            $table->timestamps();

            $table->foreign('property_id')
                    ->references('id')
                    ->on('properties')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_characteristics');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Enums\TransferStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_id')->constrained()->nullable()->onDelete('cascade');
            $table->foreignId('initial_warehouse_id')->nullable()->constrained('warehouses', 'id')->onDelete('cascade');
            $table->foreignId('destination_warehouse_id')->nullable()->constrained('warehouses', 'id')->onDelete('cascade');
            $table->enum('status', TransferStatusEnum::toArray())->nullable();
            $table->dateTime('time_completed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};

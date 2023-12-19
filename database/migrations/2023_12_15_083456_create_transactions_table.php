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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')->references('id')->on('products')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('customer_id');

            $table->foreign('customer_id')->references('id')->on('customers')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('shopkeeper_id');

            $table->foreign('shopkeeper_id')->references('id')->on('shopkeepers')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->float('sell_quantity', 8, 2);
            $table->float('total_price', 8, 2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

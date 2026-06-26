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
        Schema::create('user_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('invoice_id')->nullable()->constrained()->nullOnDelete();

            $table->string('billing_type')->default('subscription');
            // one_time | subscription | usage

            $table->string('status')->default('pending');
            // pending | active | suspended | expired | canceled

            $table->integer('quantity')->default(1);
            $table->decimal('unit_price', 12, 2)->nullable();

            $table->timestamp('started_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('next_billing_at')->nullable();
            $table->timestamp('canceled_at')->nullable();

            // usage billing
            $table->integer('usage_limit')->nullable();
            $table->integer('usage_used')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_products');
    }
};

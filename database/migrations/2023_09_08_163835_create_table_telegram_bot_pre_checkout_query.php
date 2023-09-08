<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_pre_checkout_query';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary();
            $table->bigInteger('user_id')->index();
            $table->string('currency', 3);
            $table->bigInteger('total_amount');
            $table->string('invoice_payload', 255)->default('');
            $table->string('shipping_option_id', 255)->nullable();
            $table->text('order_info')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('bot_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->tableName);
    }
};

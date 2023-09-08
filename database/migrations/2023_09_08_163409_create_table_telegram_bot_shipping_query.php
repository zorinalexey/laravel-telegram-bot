<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_shipping_query';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary();
            $table->bigInteger('user_id')->index();
            $table->string('invoice_payload', 255)->default('');
            $table->string('shipping_address', 255)->default('');
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

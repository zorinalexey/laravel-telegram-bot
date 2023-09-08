<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_user';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unique()->primary();
            $table->boolean('is_bot')->default(false);
            $table->string('first_name', 255)->default('');
            $table->string('last_name', 255)->nullable()->default(null);
            $table->string('username', 191)->nullable()->default(null)->index();
            $table->string('language_code', 10)->nullable()->default(null);
            $table->boolean('is_premium')->default(false);
            $table->boolean('added_to_attachment_menu')->default(false);
            $table->softDeletes();
            $table->timestamps();
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

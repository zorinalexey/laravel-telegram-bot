<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'bot_poll';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary();
            $table->text('question');
            $table->text('options');
            $table->integer('total_voter_count')->unsigned();
            $table->boolean('is_closed')->default(false);
            $table->boolean('is_anonymous')->default(true);
            $table->string('type', 255);
            $table->boolean('allows_multiple_answers')->default(false);
            $table->integer('correct_option_id')->unsigned();
            $table->string('explanation', 255)->default(null);
            $table->text('explanation_entities')->default(null);
            $table->integer('open_period')->unsigned()->default(null);
            $table->timestamp('close_date')->nullable()->default(null);
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

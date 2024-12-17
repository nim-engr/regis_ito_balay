<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Auto-increment unsigned BIGINT
            $table->bigInteger('task_id')->unsigned(); // Foreign key for tasks
            $table->bigInteger('user_id')->unsigned(); // Foreign key for users
            $table->text('comment_text')->collation('utf8mb4_0900_ai_ci'); // Text column with specific collation
            $table->timestamp('created_at')->useCurrent(); // Default CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Default CURRENT_TIMESTAMP and updates automatically

            // Optionally, add foreign keys
            // $table->foreign('task_id')->references('id')->on('tasks');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};

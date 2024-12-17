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
        // Create 'comments' table
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Auto-increment unsigned BIGINT
            $table->bigInteger('task_id')->unsigned(); // Foreign key for tasks
            $table->bigInteger('user_id')->unsigned(); // Foreign key for users
            $table->text('comment_text')->collation('utf8mb4_0900_ai_ci'); // Text column with specific collation
            $table->timestamp('created_at')->useCurrent(); // Default CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // CURRENT_TIMESTAMP and updates automatically

            // Foreign key constraints
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        // Create 'tasks' table
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('Task_title', 255)->collation('utf8mb4_0900_ai_ci');
            $table->text('Task_desc')->collation('utf8mb4_0900_ai_ci');
            $table->bigInteger('name')->nullable(); // Foreign key reference
            $table->date('Deadline');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->dateTime('created_at')->nullable();
            $table->enum('status', ['open', 'review', 'progress', 'close'])->default('open')->collation('utf8mb4_0900_ai_ci');
            $table->enum('Priority', ['1', '2', '3', ''])->nullable()->collation('utf8mb4_0900_ai_ci');
            $table->bigInteger('created_by')->unsigned()->nullable(); // Foreign key reference
            $table->string('file_name', 255)->nullable()->collation('utf8mb4_0900_ai_ci');
            $table->text('file_path')->nullable()->collation('utf8mb4_0900_ai_ci');
            $table->string('file_type', 255)->nullable()->collation('utf8mb4_0900_ai_ci');
            $table->timestamp('uploaded_at')->useCurrent();

            // Foreign key constraints
            $table->foreign('name')->references('id')->on('job_list')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop tables in reverse order to avoid foreign key issues
        Schema::dropIfExists('comments');
        Schema::dropIfExists('tasks');
    }
};

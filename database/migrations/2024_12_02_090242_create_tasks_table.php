<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Task_title', 255);
            $table->text('Task_desc');
            $table->unsignedBigInteger('name')->nullable();
            $table->date('Deadline');
            $table->enum('status', ['open', 'review', 'progress', 'close'])->default('open');
            $table->enum('Priority', ['1', '2', '3'])->default('1'); // 1 = Low, 2 = Moderate, 3 = High
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('file_name', 255)->nullable();
            $table->text('file_path')->nullable();
            $table->string('file_type', 255)->nullable();
            $table->timestamp('uploaded_at')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('name')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('CASCADE');
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
        Schema::dropIfExists('tasks');
    }
}

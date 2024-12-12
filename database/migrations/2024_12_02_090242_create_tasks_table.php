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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('task_title', 255);
            $table->text('task_desc')->nullable();
            $table->unsignedBigInteger('name');
            $table->date('deadline');
            $table->timestamp('updated_at')->useCurrent();
            $table->dateTime('created_at');
            $table->enum('status', ['open', 'review', 'progress', 'close'])->default('open');
            $table->enum('priority', ['1', '2', '3'])->nullable();

            // Optionally, you can add foreign keys or indexes if needed
            // $table->foreign('name')->references('id')->on('users'); // Example foreign key
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
};

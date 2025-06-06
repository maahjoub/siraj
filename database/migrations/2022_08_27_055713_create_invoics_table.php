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
        Schema::create('invoics', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('name');
            $table->bigInteger('amount');
            $table->text('note')->nullable();
            $table->enum('payment_method', ['كاش', 'بنكك', 'اوكاش', 'فوري', 'اخري'])->nullable();
            $table->foreignId('student_id')->references('id')
                ->on('students')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoics');
    }
};

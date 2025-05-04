
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Std_number');
            $table->string('mobile');
            $table->foreignId('gender_id')->unsigned()->references('id')
                ->on('genders')->cascadeOnDelete();
            $table->foreignId('class_rom_id')->unsigned()->references('id')
                ->on('class_roms')->cascadeOnDelete();
            $table->foreignId('phase_id')->unsigned()->references('id')
                ->on('phases')->cascadeOnDelete();
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
        Schema::dropIfExists('students');
    }
};

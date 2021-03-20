<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('enseignant_id')->constrained('enseignants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return 
     */
    public function down()
    {
        Schema::dropIfExists('matieres');
    }
}

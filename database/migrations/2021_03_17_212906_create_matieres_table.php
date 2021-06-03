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
            $table->boolean('has_tp')->default(false);
            $table->boolean('has_td')->default(false);
            $table->boolean('has_cour')->default(false);
            $table->enum('niveau', ['premiére licence', 'deuxième licence', 'troisième licence', 'première mastère', 'deuxième mastère']);
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade')->onUpdate('cascade');
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

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
        Schema::create('ouvrages', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('auteur');
            $table->string('editeur');
            $table->string('categorie');
            $table->string('langue')->nullable();
            $table->string('annee')->nullable();
            $table->string('description');
            $table->integer('nb_pages')->nullable();
            $table->string('image')->nullable();
            $table->string('pdf');
            $table->string('slug');
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
        Schema::dropIfExists('ouvrages');
    }
};

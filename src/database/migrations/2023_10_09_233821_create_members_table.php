<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reg_form.members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('report_subject');
            $table->string('country');
            $table->string('phone');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->string('about_me')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('hidden');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

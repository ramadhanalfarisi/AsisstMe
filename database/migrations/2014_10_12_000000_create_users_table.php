<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('role', ['User', 'Superuser'])->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_telp')->nullable();
            $table->boolean('status_hire')->nullable();
            $table->integer('rating')->nullable();
            $table->string('bio')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('foto_cv')->nullable();
            $table->string('portfolio')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

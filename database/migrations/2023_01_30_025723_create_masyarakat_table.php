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
        Schema::create('masyarakat', function (Blueprint $table) {
            
            $table->id('id_masyarakat');
            $table->char('nik',16); 
            $table->string('nama',35);  
            $table->string('username',25)->unique();
            $table->string('email',25)->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->string('telp',13);
            // $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masyarakat');
    }
};

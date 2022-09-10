<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('routers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('host');
            $table->integer('port')->default(22);
            $table->string('user');
            $table->enum('platform', ['frr']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('routers');
    }
};

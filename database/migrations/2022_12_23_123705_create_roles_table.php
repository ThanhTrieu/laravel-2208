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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // tu dong tao truong id, tu dong tang va kieu biginteger
            $table->string('name',100)->unique();
            $table->string('description', 200)->nullable();
            $table->timestamps(); // mac dinh tao 2 cot created_at, updated_at
            $table->softDeletes(); // tu dong tao theo truong deleted_at (kieu timestamps)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('firstpages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lan',10)->nullable();
            $table->string('title',255)->nullable();
            $table->string('metatitle',255)->nullable();           
            $table->text('metacontent')->nullable();
            $table->text('metakeywords')->nullable();
            $table->string('image',255)->nullable();
            $table->string('link',255)->nullable();
            $table->string('description',255)->nullable();
            $table->string('author',255)->nullable();
            $table->string('kind',255)->nullable();
            $table->boolean('publish')->default(false)->nullable();
            $table->boolean('trash')->default(false)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('firstpages');
    }
}

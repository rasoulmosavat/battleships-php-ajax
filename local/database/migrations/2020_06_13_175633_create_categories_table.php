<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');           
            $table->string('title',255)->nullable();
            $table->string('parent-category',255)->nullable();
            $table->string('chield-category',255)->nullable();
            $table->string('kind',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('metatitle',255)->nullable();           
            $table->text('metacontent')->nullable();
            $table->text('metakeywords')->nullable();
            $table->text('content')->nullable();
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
        Schema::dropIfExists('categories');
    }
}

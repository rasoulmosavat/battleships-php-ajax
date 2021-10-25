<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
      {
        Schema::create('coupones', function (Blueprint $table) {
            $table->bigIncrements('id');           
            $table->string('title',255)->nullable();
            $table->text('scrap')->nullable();
            $table->text('content')->nullable();
            $table->string('image',255)->nullable();
            $table->string('imageurl',255)->nullable();
            $table->string('metatitle',255)->nullable();           
            $table->text('metacontent')->nullable();
            $table->text('metakeywords')->nullable();
            $table->string('copune-code',255)->nullable();
            $table->string('link',255)->nullable();      
            $table->integer('category-id')->nullable();
            $table->integer('brand-id')->nullable();
            $table->integer('priority')->nullable();
            $table->boolean('popular-couponedeal')->default(false);
            $table->boolean('coupon-deal')->default(false);
            $table->string('lan',10)->nullable();
            $table->date('start-date')->nullable();
            $table->date('end-date')->nullable();
            $table->string('author',255)->nullable();
            $table->boolean('publish')->default(false);
            $table->boolean('trash')->default(false);
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
        Schema::dropIfExists('coupones');
    }
}

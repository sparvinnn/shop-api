<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('inventory_number')->default(0);//موجودی
            $table->integer('total_number')->default(0);//کل تعداد
            $table->integer('sales_number')->default(0);//تعداد فرپخته شده
            $table->integer('rate')->default(0);
            $table->integer('vote')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}

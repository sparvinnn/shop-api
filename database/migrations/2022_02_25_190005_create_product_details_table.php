<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('size')->nullable();//اندازه
            $table->foreignId('material')->nullable();//جنس
            $table->foreignId('color')->nullable();//رنگ
            $table->foreignId('design')->nullable();//طرح
            $table->foreignId('sleeve')->nullable();//آستین
            $table->foreignId('piece')->nullable();//تعداد تکه
            $table->foreignId('set_type')->nullable();//نوع ست
            $table->foreignId('description')->nullable();//توضیحات
            $table->foreignId('maintenance')->nullable();//نگهداری
            $table->foreignId('made_in')->nullable();//تولید کننده
            $table->foreignId('origin')->nullable();//مبدا
            $table->foreignId('type')->nullable();//نوع
            $table->foreignId('for_use')->nullable();//استفاده برای
            $table->foreignId('collar')->nullable();//یقه
            $table->foreignId('height')->nullable();//قد
            $table->foreignId('physical_feature')->nullable();//ویژگی های ظاهری
            $table->foreignId('production_time')->nullable();//زمان تولید
            $table->foreignId('demension')->nullable();
            $table->foreignId('crotch')->nullable();//فاق
            $table->foreignId('close')->nullable();//بسته شدن
            $table->foreignId('drop')->nullable();//دراپ
            $table->foreignId('cumin')->nullable();//زیره
            $table->foreignId('close_shoes')->nullable();//نوع بستن کفش
            $table->foreignId('typeـofـclothing')->nullable();//نوع لباس 
            $table->foreignId('specialized_features')->nullable();//ویژگی ها تخصصی
            $table->integer('inventory_number')->default(0);//موجودی
            $table->integer('total_number')->default(0);//کل تعداد
            $table->integer('sales_number')->default(0);//تعداد فروخته شده
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
        Schema::dropIfExists('product_details');
    }
}

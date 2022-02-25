<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');//دسته بندی
            $table->boolean('size')->default(0);//اندازه
            $table->boolean('material')->default(0);//جنس
            $table->boolean('color')->default(0);//رنگ
            $table->boolean('design')->default(0);//طرح
            $table->boolean('sleeve')->default(0);//آستین
            $table->boolean('piece')->default(0);//تعداد تکه
            $table->boolean('set_type')->default(0);//نوع ست
            $table->boolean('description')->default(0);//توضیحات
            $table->boolean('maintenance')->default(0);//نگهداری
            $table->boolean('made_in')->default(0);//تولید کننده
            $table->boolean('origin')->default(0);//مبدا
            $table->boolean('type')->default(0);//نوع
            $table->boolean('for_use')->default(0);//استفاده برای
            $table->boolean('collar')->default(0);//یقه
            $table->boolean('height')->default(0);//قد
            $table->boolean('physical_feature')->default(0);//ویژگی های ظاهری
            $table->boolean('production_time')->default(0);//زمان تولید
            $table->boolean('demension')->default(0);
            $table->boolean('crotch')->default(0);//فاق
            $table->boolean('close')->default(0);//بسته شدن
            $table->boolean('drop')->default(0);//دراپ
            $table->boolean('cumin')->default(0);//زیره
            $table->boolean('close_shoes')->default(0);//نوع بستن کفش
            $table->boolean('typeـofـclothing')->default(0);//نوع لباس 
            $table->boolean('specialized_features')->default(0);//ویژگی ها تخصصی
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
        Schema::dropIfExists('category_properties');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProperty extends Model
{
    use HasFactory;

    protected $fillabled = [
            'size', //اندازه
            'material', //جنس
            'color', //رنگ
            'design', //طرح
            'sleeve', //آستین
            'piece', //تعداد تکه
            'set_type', //نوع ست
            'description', //توضیحات
            'maintenance', //نگهداری
            'made_in', //تولید کننده
            'origin', //مبدا
            'type', //نوع
            'for_use', //استفاده برای
            'collar', //یقه
            'height', //قد
            'physical_feature', //ویژگی های ظاهری
            'production_time', //زمان تولید
            'demension', //بعد
            'crotch', //فاق
            'close', //بسته شدن
            'drop', //دراپ
            'cumin', //زیره
            'close_shoes', //نوع بستن کفش
            'typeـofـclothing', //نوع لباس 
            'specialized_features', //ویژگی ها تخصصی
    ];
}

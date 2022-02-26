<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryProperty;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "name_fa" =>  "required",
            "name_en" =>  "required",
            "slug" =>  "required",
        ]);

        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }
        try{
            $input = $request->all();
            $category = Category::create($input);
            return response()->json(["status" => "success", "message" => "Success! create category completed", "data" => $category]);
        }catch (\Exception $exception){
            return response()->json(["status" => "failed", "message" => $exception]);
        }
    }

    public function setProperties(Request $request){
        $list = $request->properties;
        
            try{
                $category_meta= CategoryProperty::create([
                    'size' => $request->size,//اندازه
                    'material' => $request->material,//جنس
                    'color'=> $request->color,//رنگ
                    'design'=> $request->design,//طرح
                    'sleeve'=> $request->sleeve,//آستین
                    'piece'=> $request->piece,//تعداد تکه
                    'set_type'=> $request->set_type,//نوع ست
                    'description'=> $request->description,//توضیحات
                    'maintenance'=> $request->maintenance,//نگهداری
                    'made_in'=> $request->made_in,//تولید کننده
                    'origin'=> $request->origin,//مبدا
                    'type'=> $request->type,//نوع
                    'for_use'=> $request->for_use,//استفاده برای
                    'collar'=> $request->collar,//یقه
                    'height'=> $request->height,//قد
                    'physical_feature'=> $request->physical_feature,//ویژگی های ظاهری
                    'production_time'=> $request->production_time,//زمان تولید
                    'demension'=> $request->demension,
                    'crotch'=> $request->crotch,//فاق
                    'close'=> $request->close,//بسته شدن
                    'drop'=> $request->drop,//دراپ
                    'cumin'=> $request->cumin,//زیره
                    'close_shoes'=> $request->close_shoes,//نوع بستن کفش
                    'typeـofـclothing'=> $request->typeـofـclothing,//نوع لباس 
                    'specialized_features'=> $request->specialized_features,//ویژگی ها 
                ]);
                return response()->json(["status" => "success", "message" => "Success! add category_meta completed"]);
            }catch (\Exception $exception){
                return response()->json(["status" => "failed", "message" => $exception]);
            }
    }
}

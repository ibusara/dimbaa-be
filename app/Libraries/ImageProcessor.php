<?php


namespace App\Libraries;


use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use function Ramsey\Uuid\Generator\timestamp;

/**
 * Class ImageProcessor
 * @package App\Libraries
 */
class ImageProcessor
{

    /**
     * @param Request $request
     * @param string $field_name
     * @param int $width
     * @param int $height
     */
    public function resize_image(Request $request,$field_name = 'image',$width = 200,$height = 200 ){

        $validator = Validator::make($request->only($field_name),[
            $field_name => 'required|mimes:png,jpg,jpeg,bmp,gif|max:2048',
        ]);
        if ($validator->fails()){
            return response()->json(['errors'=>true,'success'=>false,'message'=>Arr::flatten($validator->errors()->get('*'))],500);
        }
        $image = $request->file($field_name);
        $extension = $image->getClientOriginalExtension();
        $file_name = "IMG-".time().'.'.$extension;
        $resize = Image::make($image->getRealPath());
        $resize->resize($width,$height,function ($constraint){
            $constraint->aspectRatio();
        })->sharpen(90)->save(public_path("images/$file_name"));
        return response()->json(['success'=>true,'path'=>"/images/$file_name",'result'=>'success'],200);
    }

}

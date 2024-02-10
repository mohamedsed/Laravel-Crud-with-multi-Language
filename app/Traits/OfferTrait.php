<?php
namespace App\Traits;

Trait OfferTrait{
    protected function  saveImage($image , $path){
        $file_extension=$image->getClientOriginalExtension();
        $fileName=time().'.'.$file_extension;
        $path = $path;
        $image->move($path,$fileName);
        return $fileName;

    }
}

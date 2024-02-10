<?php

namespace App\Http\Controllers;


use App\Models\Offers;
use LaravelLocalization;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\OfferRequest;
use Illuminate\Support\Facades\Validator;


class OfferController extends Controller
{
    use OfferTrait;
    public function show() {
       $offer =  Offers::select('id',
       'name_'.LaravelLocalization::getCurrentLocale().' as name' , 'price' ,
       'description_'.LaravelLocalization::getCurrentLocale() .' as details', 'image')
       ->get(); ;
        return view('crud.home',compact('offer'));
    }
    public function creat(OfferRequest $request){
        //save image
        $fileName= $this->saveImage($request->image , 'images/offer');


        Offers::create([
            'image'=>$fileName,
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'description_en'=> $request->description_en,
            'description_ar'=> $request->description_ar,
            'price'=>$request->price,]);
        return redirect()->back()->with(['message'=>'Offer Added Successfully']);}
    public function deleteOffer($id){
        $offer = Offers::find($id);
        if($offer){
            $offer->delete();
            return redirect()->back()->with(["delete"=>"Offer Deleted Successfully"]);
        }else{
            return 'This Offer is Not Valied';
        }
    }
    public function editOffer($id){
        $offer = Offers::find($id);
        return view('crud.edite' , compact('offer'));
    }
    public function updateOffer(OfferRequest $request , $id){
        $offer = Offers::find($id);
        $fileName= $this->saveImage($request->image , 'images/offer');
        $offer->update([
            'image'=>$fileName,
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'description_en'=> $request->description_en,
            'description_ar'=> $request->description_ar,
            'price'=>$request->price,
        ]);
        return redirect()->back()->with('message','The Offer Has Been Updated');


    }


}

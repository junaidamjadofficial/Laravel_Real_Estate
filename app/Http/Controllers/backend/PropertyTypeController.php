<?php

namespace App\Http\Controllers\backend;

use App\Models\PropertyType;
use App\Models\Amenitites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller
{
    public function AllType(){
        $types=PropertyType::latest()->get();
        return view('Backend.type.all_type',compact('types'));
    }//End Method

    public function AddType(){
        return view('Backend.type.add_type');
    }//End Method

    public function StoreType(Request $request){
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);
        PropertyType::create([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);
        $notification=array(
            'message' => 'Property type has been added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.type')->with($notification);
    }//End Method

    public function EditType($id){
        $type=PropertyType::findOrFail($id);
        return view('Backend.type.Edit_type',compact('type'));
    }
    public function UpdateType(Request $request){
        PropertyType::findOrFail($request->id)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);
        $notification=array(
            'message' => 'Property type has been updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.type')->with($notification);
    }//End Method

    public function DeleteType($id){
        $type=PropertyType::findOrFail($id)->delete();
          $notification=array(
            'message' => 'Property type has been Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    /////////// Amenities All Method/////////////
    public function AllAmenitie(){
        $Amenities=Amenitites::latest()->get();
        return view('Backend.Amenities.all_Amenities',compact('Amenities'));
    }//End Method
    public function AddAmenitie(){
        return view('Backend.Amenities.add_Amenities');
    }//End Method

    public function StoreAmenitie(Request $request){
        $request->validate([
            'amenities_name' => 'required',
           
        ]);
        Amenitites::create([
            'amenities_name' => $request->amenities_name,
        ]);
        $notification=array(
            'message' => 'Amenitites has been added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.Amenitie')->with($notification);
    }//End Method

    public function EditAmenitie($id){
        $Amenitite=Amenitites::findOrFail($id);
        return view('Backend.Amenities.edit_Amenities',compact('Amenitite'));
    }
    public function UpdateAmenitie(Request $request){
        Amenitites::findOrFail($request->id)->update([
            'amenities_name' => $request->amenities_name,
           
        ]);
        $notification=array(
            'message' => 'Property type has been updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.Amenitie')->with($notification);
    }//End Method

    public function DeleteAmenitie($id){
        $Amenitites=Amenitites::findOrFail($id)->delete();
          $notification=array(
            'message' => 'Property type has been Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}

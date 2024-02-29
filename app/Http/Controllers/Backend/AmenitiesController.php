<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Amenities;

class AmenitiesController extends Controller
{
    public function allAmenities (Request $request)
    {
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    }// End Method

    public function addAmenities()
    {
        return view('backend.amenities.add_amenities');
    }// End Method

    public function storeAmenities(Request $request)
    {
        // $request->validate([
        //     'amenities_name' => 'required|unique:property_types|max:200',
        // ]);

        Amenities::insert([
            'amenities_name' => $request->amenities_name,
        ]);
        $notification = array(
            'message' => 'Amenities Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenities')->with($notification);
    } // End Method


    public function editAmenities($id)
    {
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenities', compact('amenities'));
    }// End Method


    public function updateAmenities(Request $request)
    {
        $pid = $request->id;
        // $request->validate([
        //     'amenities_name' => 'required|unique:property_types|max:200',
        // ]);

        Amenities::findOrFail($pid)->update([
            'amenities_name' => $request->amenities_name,
        ]);
        $notification = array(
            'message' => 'Amenities Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenities')->with($notification);
    } // End Method

    public function deleteAmenities($id)
    {
        Amenities::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Amenities Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}

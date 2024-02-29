<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function allType(Request $request)
    {
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    }// End Method

    public function addType()
    {
        return view('backend.type.add_type');
    }// End Method

    public function storeType(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required',
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);
        $notification = array(
            'message' => 'Property Type Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    } // End Method


    public function editType($id)
    {
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type', compact('types'));
    }// End Method


    public function updateType(Request $request)
    {
        $pid = $request->id;
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required',
        ]);

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);
        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    } // End Method

    public function deleteType($id)
    {
        PropertyType::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}

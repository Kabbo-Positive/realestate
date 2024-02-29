<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.index');
    } // End Method

    public function adminLogOut(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End Method

    public function adminLogIn(Request $request)
    {
        return view('admin.admin_login');
    } // End Method

    public function adminProfile(Request $request)
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    } // End Method

    public function adminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if ($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function adminChangePassword(Request $request)
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    } // End Method

    public function adminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required | confirmed',
        ]);
        // Match the old password
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => 'Old Password Does Not Match',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        // Update The New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    } // End Method


 /// All Admin User
    public function allAdmin()
    {
        $allAdmins = User::where('role','admin')->get();
        return view('backend.pages.admin.all_admin',compact('allAdmins'));
    } // End Method

    public function addAdmin()
    {
        $roles = Role::all();
        return view('backend.pages.admin.add_admin',compact('roles'));
    }// End Method

    public function storeAdmin(Request $request)
    {
        // $request->validate([
        //     'amenities_name' => 'required|unique:property_types|max:200',
        // ]);
        //return $request->roles;
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin' ;  
        $user->status = 'active';
        $user->save();

        if ($request->has('roles')) {
            $user->assignRole($request->roles);
        }
        $user->save();

        $notification = array(
            'message' => 'Admin User Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    } // End Method


    public function editAdmin($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_admin', compact('user','roles'));
    }// End Method


    public function updateAdmin(Request $request, $id)
    {
        // $request->validate([
        //     'amenities_name' => 'required|unique:property_types|max:200',
        // ]);
        //return $request->roles;
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin' ;  
        $user->status = 'active';
        $user->save();
        $user->roles()->detach();

        if ($request->has('roles')) {
            $user->assignRole($request->roles);
        }
        $user->save();

        $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    } // End Method

    public function deleteAdmin($id)
    {
        $user = User::findOrFail($id);
        if(!is_null($user))
        {
            $user->delete();
        }
        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
    
}

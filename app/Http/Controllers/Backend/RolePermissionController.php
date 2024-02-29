<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
    // For All Permission
    public function allPermission (Request $request)
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }// End Method

    public function addPermission()
    {
        return view('backend.pages.permission.add_permission');
    }// End Method

    public function storePermission(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }// End Method

    public function editPermission($id)
    {
        $permissions = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permissions'));
    }// End Method

    public function updatePermission(Request $request)
    {
        $per_id = $request->id;
        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }// End Method

    public function deletePermission($id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method

    public function importPermission()
    {
        return view('backend.pages.permission.import_permission');
    }// End Method

    public function export()
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }// End Method

    public function import(Request $request)
    {
        Excel::import(new PermissionImport, $request->file('import_fime'));
        
        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
    


    // For All Role ////
    public function allRoles (Request $request)
    {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }// End Method

    public function addRoles()
    {
        return view('backend.pages.roles.add_roles');
    }// End Method

    public function storeRoles(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Role Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }// End Method

    public function editRoles($id)
    {
        $roles = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles', compact('roles'));
    }// End Method

    public function updateRoles(Request $request)
    {
        $role_id = $request->id;
        Role::findOrFail($role_id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }// End Method

    public function deleteRoles($id)
    {
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method


    //// Add Role Permission All Method

    public function addRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.add_roles_permission', compact('roles','permissions','permission_groups'));
    }


    public function rolesPermissionStore(Request $request)
    {
         $data = array();
         $permissions = $request->permission;
         
         foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
         } // End  Foreach
         $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }// End Method

    public function allRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.all_roles_permission', compact('roles','permissions','permission_groups'));
    }// End Method

    public function adminEditRolePermission($id)
    {
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.edit_roles_permission', compact('roles','permissions','permission_groups'));
    }// End Method

    public function adminUpdateRolePermission(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        $data = array();
        foreach ($permissions as $key => $item){
        $data[$key] = (int)$item;
        }

        if (!empty($data)){
        $role->syncPermissions($data);
        }
    
        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }// End Method
    
    public function adminDeleteRolePermission($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)){
            $role->delete();
        }
        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
    
}

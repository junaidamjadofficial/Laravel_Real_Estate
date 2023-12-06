<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission(){
        $permission=Permission::latest()->get();
        return view('Backend.pages.permission.all_permission',compact('permission'));
    }
    public function AddPermission(){
        return view('Backend.pages.permission.add_permission');
    }
    public function StorePermission(Request $request){
                // Check if a permission with the same name already exists
        $existingPermission = Permission::where('name', $request->name)->first();

        if ($existingPermission) {
            // Handle the case where the permission already exists
            $notification = array(
                'message' => 'Permission with the same name already exists',
                'alert-type' => 'error'
            );

            return redirect()->route('all.Permission')->with($notification);
        } else {
            // Create a new permission if it doesn't exist
            $permission = Permission::create([
                'name' => $request->name,
                'group_name' => $request->group_name,
            ]);

            $notification = array(
                'message' => 'Permission has been added successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.Permission')->with($notification);
        }

    }

    public function EditPermission($id){
        $permission=Permission::findOrFail($id);
        return view('Backend.pages.permission.edit_permission',compact('permission'));
    }
    
    public function UpdatePermission(Request $request){
        $existingPermission=Permission::where('id',$request->id)->first();
        if($existingPermission){
            if($existingPermission->name != 'name' && Permission::where('name',$request->name)->first()){
                $notification = array(
                'message' => 'Permission with the same name already exists',
                'alert-type' => 'error'
                );
                return redirect()->route('all.Permission')->with($notification);
            }
            $existingPermission->update([
             'name' => $request->name,
             'group_name' => $request->group_name,
            ]);

            $notification = array(
                'message' => 'Permission has been updated successfully',
                'alert-type' => 'success'
            );
           return redirect()->route('all.Permission')->with($notification);
        } else {
            // Handle the case where the permission with the given ID doesn't exist
            $notification = array(
                'message' => 'Permission not found',
                'alert-type' => 'error'
            );

            return redirect()->route('all.Permission')->with($notification);
        }
        
    }
    public function DeletePermission($id){
        $permission=Permission::findOrFail($id)->delete();
          $notification=array(
            'message' => 'Permission  has been Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ImportPermission(){
        return view('Backend.pages.permission.import_permission');
    }
    public function Export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }
    public function Import(Request $request){
        Excel::import(new PermissionImport,$request->file('import_file'));
         $notification=array(
            'message' => 'Permission file imported Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.Permission')->with($notification);
    }
    public function AllRoles(){
        $Role=Role::latest()->get();
        return view('Backend.pages.Roles.all_roles',compact('Role'));
    }
    public function AddRoles(){
        return view('Backend.pages.Roles.add_Roles');
    }
     public function StoreRoles(Request $request){
        // Check if a role with the same name already exists
        $existingRole = Role::where('name', $request->name)->first();

        if ($existingRole) {
            $notification = array(
                'message' => 'Role with the same name already exists',
                'alert-type' => 'error'
            );

            return redirect()->route('all.Roles')->with($notification);
        } else {
            // Create a new role if it doesn't exist
            Role::create([
                'name' => $request->name,
            ]);

            $notification = array(
                'message' => 'Role has been added successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.Roles')->with($notification);
        }

    }

    public function EditRoles($id){
        $Role=Role::findOrFail($id);
        return view('Backend.pages.Roles.edit_roles',compact('Role'));
    }
    
    public function UpdateRoles(Request $request){
                // Find the existing role by ID
        $existingRole = Role::where('id', $request->id)->first();

        if ($existingRole) {
            // Check if the name is being changed and if the new name already exists
            if ($existingRole->name != $request->name && Role::where('name', $request->name)->exists()) {
                $notification = array(
                    'message' => 'Role with the same name already exists',
                    'alert-type' => 'error'
                );

                return redirect()->route('all.Roles')->with($notification);
            }

            // Update the role if everything is okay
            $existingRole->update([
                'name' => $request->name,
            ]);

            $notification = array(
                'message' => 'Role has been updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.Roles')->with($notification);
        } else {
            // Handle the case where the role with the given ID doesn't exist
            $notification = array(
                'message' => 'Role not found',
                'alert-type' => 'error'
            );

            return redirect()->route('all.Roles')->with($notification);
        }

    }
    public function DeleteRoles($id){
        Role::findOrFail($id)->delete();
          $notification=array(
            'message' => 'Role  has been Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    ////////////////ADD Role Permission////////////////////
    public function AddRolePermission(){
        $Roles=Role::all();
        $permissions=Permission::all();
        $permission_groups=User::getpermissiongroups();
        return view('Backend.pages.roleSetup.add_roles_permission',compact('Roles','permissions','permission_groups'));
    }

    public function RolePermissionStore(Request $request){
        $data = [];
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            // Check if the combination already exists
            $existingRecord = DB::table('role_has_permissions')
                ->where('role_id', $request->role_id)
                ->where('permission_id', $item)
                ->exists();

            if (!$existingRecord) {
                // If the combination doesn't exist, insert the new record
                DB::table('role_has_permissions')->insert([
                    'role_id' => $request->role_id,
                    'permission_id' => $item,
                ]);
            } else {
                // Notify that the combination already exists
                $notification = [
                    'message' => 'Role Permission combination already exists',
                    'alert-type' => 'error',
                ];

                return redirect()->route('all.roles.permission')->with($notification);
            }
        }

        $notification = [
            'message' => 'Role Permission has been added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles.permission')->with($notification);

    }
    public function AllRolePermission(){
        $Roles=Role::all();
        return view('Backend.pages.roleSetup.all_roles_permission ',compact('Roles'));
    }
    public function AdminEditRole($id){
        $Role=Role::findOrFail($id);
        $permissions=Permission::all();
        $permission_groups=User::getpermissiongroups();
        return view('Backend.pages.roleSetup.edit_roles_permission',compact('Role','permissions','permission_groups'));
    }
    public function AdminRoleUpdate(Request $request,$id){
        
        $role=Role::findOrFail($id);

        $permissions=$request->permission;
        
        $role->syncPermissions($permissions);
       
        $notification = [
            'message' => 'Role Permission has been updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }
    public function AdminRoleDelete($id){
        $role=Role::findOrFail($id);
        if(!is_null($role))
        {
            $role->delete();
        }
        $notification = [
            'message' => 'Role Permission has been deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

   
}

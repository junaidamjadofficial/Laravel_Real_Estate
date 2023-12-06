<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function AdminDashboard(){ 
        return view('Admin.index');
    }
    //End Method
    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification=array(
            'message' => 'Admin Log out Successfully',
            'alert-type'=>'success'
        );
        return redirect('/Admin/Admin_Login')->with($notification);
    }
    //End Method
    public function AdminLogin(){
        return view('Admin.Admin_login');
    }
    //End Method
    public function Adminprofile(){
        $id=Auth::user()->id;
        $profileData=User::find($id);
        return view('Admin.Admin_profile_view',compact('profileData'));
    }
    //End Method
    public function AdminprofileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->username=$request->username ;
        $data->name=$request->name ;
        $data->email=$request->email ;
        $data->phone=$request->phone ;
        $data->address=$request->address;

        if($request->file('photo')){
            $file=$request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename=date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo']=$filename;
        }
        $data->save();
        $notification=array(
            'message' => 'Admin profile Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    //End Method

    public function AdminChangepassword(){
        $id=Auth::user()->id;
        $profileData=User::find($id);
        return view('Admin.Admin_change_password',compact('profileData'));
    }
    //End method

    public function AdminUpdatepassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        if(!Hash::check($request->old_password, Auth::user()->password)){
            $notification=array(
                'message' => 'Old Password does not match',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }
        //Update the New password
        User::whereId(Auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);         
        $notification=array(
            'message' => 'Password has been changed Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function AllAdmin(){
        $AllAdmin=User::where('role','Admin')->get();
        return view('Backend.pages.admin.all_admin',compact('AllAdmin'));
    }
    public function AddAdmin(){
        $Roles=Role::all();
        return view('Backend.pages.admin.add_admin',compact('Roles'));
    }
    public function StoreAdmin(Request $request){
        $user=User::create([
            'name' =>$request->name,
            'username' =>$request->username,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'address' =>$request->address,
            'role' =>'admin',
            'password' => Hash::make($request->password),
            'status' => 'active',
        ]);
        if($request->role){
            $user->assignRole($request->role);
        }
         $notification=array(
                'message' => 'New Admin User inserted Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.admin')->with($notification);
    }
    public function EditAdmin($id){
        $user=User::findOrFail($id);
         $Roles=Role::all();
        return view('Backend.pages.admin.edit_admin',compact('user','Roles'));
    }
    public function UpdateAdmin(Request $request,$id){
        $user=User::findOrFail($id);
        if($user){    
            $user->name =$request->name;
            $user->username =$request->username;
            $user->email =$request->email;
            $user->phone =$request->phone;
            $user->address =$request->address;
            $user->role ='admin';
            $user->status = 'active';
        }
       $user->save();
        $user->roles()->detach();
        if($request->role){
            $user->assignRole($request->role);
        }
        $notification=array(
            'message' => 'New Admin User updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }
    public function DeleteAdmin($id){
        $User=User::findOrFail($id);
        if(!is_null($User))
        {
            $User->delete();
        }
        $notification = [
            'message' => 'Admin User has been deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}

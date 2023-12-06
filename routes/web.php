<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\PropertyTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//Admin  Group Middleware
Route::middleware(['auth','roles:Admin'])->group(function(){
    Route::get('/Admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('Admin.Dashboard');
    Route::get('/Admin/Logout', [AdminController::class, 'AdminLogout'])->name('Admin.Logout');
    Route::get('/Admin/profile', [AdminController::class, 'Adminprofile'])->name('Admin.profile');
    Route::post('/Admin/profile/store', [AdminController::class, 'AdminprofileStore'])->name('Admin.profile.store');
    Route::get('/Admin/profile/change_password', [AdminController::class, 'AdminChangepassword'])->name('Admin.profile.change.password');
    Route::post('/Admin/profile/update_password', [AdminController::class, 'AdminUpdatepassword'])->name('Admin.profile.update.password');
    
});
//End group Admin middleware

//Agent  Group Middleware
Route::middleware(['auth','roles:agent'])->group(function(){
    Route::get('/Agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('Agent.Dashboard');
});
//End group agent Middleware 

Route::get('/Admin/Admin_Login', [AdminController::class, 'AdminLogin'])->name('Admin.Login');

//Admin Group Middleware
Route::middleware(['auth','roles:Admin'])->group(function(){
    //Property Type Group(All) Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type', 'AllType')->name('all.type')->middleware('permission:all.type');
        Route::get('/add/type', 'AddType')->name('add.type')->middleware('permission:add.type');
        Route::post('/store/type','StoreType')->name('store.type');
        Route::get('/edit/type/{id}','EditType')->name('edit.type');
        Route::post('/update/type','UpdateType')->name('update.type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete.type');
        
        });
        //Amenities Type All route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/add/Amenitie', 'AddAmenitie')->name('add.Amenitie')->middleware('permission:add.Amenitie');
        Route::get('/all/Amenitie', 'AllAmenitie')->name('all.Amenitie')->middleware('permission:all.Amenitie');
        Route::post('/store/Amenitie','StoreAmenitie')->name('store.Amenitie');
        Route::get('/edit/Amenitie/{id}','EditAmenitie')->name('edit.Amenitie');
        Route::post('/update/Amenitie','UpdateAmenitie')->name('update.Amenitie');
        Route::get('/delete/Amenitie/{id}','DeleteAmenitie')->name('delete.Amenitie');
        
        });
        //Permission All Route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/Permission', 'AllPermission')->name('all.Permission');
        Route::get('/add/Permission', 'AddPermission')->name('add.Permission');
        Route::post('/store/Permission','StorePermission')->name('store.Permission');
        Route::get('/edit/Permission/{id}','EditPermission')->name('edit.Permission');
        Route::post('/update/Permission','UpdatePermission')->name('update.Permission');
        Route::get('/delete/Permission/{id}','DeletePermission')->name('delete.Permission');
        Route::get('/import/Permission', 'ImportPermission')->name('import.Permission');
        Route::get('/export', 'Export')->name('export');
        Route::post('/import', 'Import')->name('import');
        });
        //Roles All Route
    Route::controller(RoleController::class)->group(function()
    {
        Route::get('/all/Roles', 'AllRoles')->name('all.Roles');
        Route::get('/add/Roles', 'AddRoles')->name('add.Roles');
        Route::post('/store/Roles','StoreRoles')->name('store.Roles');
        Route::get('/edit/Roles/{id}','EditRoles')->name('edit.Roles');
        Route::post('/update/Roles','UpdateRoles')->name('update.Roles');
        Route::get('/delete/Roles/{id}','DeleteRoles')->name('delete.Roles');
        Route::get('/import/Roles', 'ImportRoles')->name('import.Roles');
        Route::get('/add/roles/permission', 'AddRolePermission')->name('add.roles.permission');
        Route::post('/roles/permission/store', 'RolePermissionStore')->name('roles.permission.store');
        Route::get('/all/roles/permission', 'AllRolePermission')->name('all.roles.permission');
        Route::get('/admin/edit/role/{id}', 'AdminEditRole')->name('admin.edit.roles');
        Route::post('admin/roles/update/{id}', 'AdminRoleUpdate')->name('admin.roles.update');
        Route::get('admin/delete/roles/{id}', 'AdminRoleDelete')->name('admin.delete.roles');
        
    });
    //Admin User All Route
    Route::controller(AdminController::class)->group(function(){
        Route::get('all/admin','AllAdmin')->name('all.admin');
        Route::get('add/admin','AddAdmin')->name('add.admin');   
        Route::post('store/admin','StoreAdmin')->name('store.admin'); 

        Route::get('edit/admin/{id}','EditAdmin')->name('edit.admin');  
        Route::post('update/admin/{id}','UpdateAdmin')->name('update.admin'); 
        Route::get('delete/admin/{id}','DeleteAdmin')->name('delete.admin');  
    });
       
    }
    
);


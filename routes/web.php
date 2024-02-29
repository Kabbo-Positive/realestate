<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AmenitiesController;
use App\Http\Controllers\Backend\RolePermissionController;
use Illuminate\Support\Facades\Route;

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
//  For Admin Login
Route::get('/admin/login', [AdminController::class, 'adminLogIn'])->name('admin.login');
//  For Admin Group Midleware
Route::middleware(['auth','roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name('admin.update.password');
    Route::get('/admin/logout', [AdminController::class, 'adminLogOut'])->name('admin.logout');
});
//  For Admin Group Midleware
Route::middleware(['auth','roles:admin'])->group(function () {
   // For PropertyType All Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type', 'allType')->name('all.type')->middleware('permission:all.type');
        Route::get('/add/type', 'addType')->name('add.type')->middleware('permission:add.type');
        Route::post('/store/type', 'storeType')->name('store.type');
        Route::get('/edit/type/{id}', 'editType')->name('edit.type');
        Route::post('/update/type/{id}', 'updateType')->name('update.type');
        Route::get('/delete/type/{id}', 'deleteType')->name('delete.type');
    });
    // For Amenity All Route
    Route::controller(AmenitiesController::class)->group(function(){
        Route::get('/all/amenities', 'allAmenities')->name('all.amenities');
        Route::get('/add/amenities', 'addAmenities')->name('add.amenities');
        Route::post('/store/amenities', 'storeAmenities')->name('store.amenities');
        Route::get('/edit/amenities/{id}', 'editAmenities')->name('edit.amenities');
        Route::post('/update/amenities/{id}', 'updateAmenities')->name('update.amenities');
        Route::get('/delete/amenities/{id}', 'deleteAmenities')->name('delete.amenities');
    });

    // For Permission Route
    Route::controller(RolePermissionController::class)->group(function(){
        Route::get('/all/permission', 'allPermission')->name('all.permission');
        Route::get('/add/permission', 'addPermission')->name('add.permission');
        Route::post('/store/permission', 'storePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'editPermission')->name('edit.permission');
        Route::post('/update/permission/{id}', 'updatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'deletePermission')->name('delete.permission');

        Route::get('/import/permission', 'importPermission')->name('import.permission');
        Route::get('/export', 'export')->name('export');
        Route::post('/import', 'import')->name('import');
    });
    // For Roles Route
    Route::controller(RolePermissionController::class)->group(function(){
        Route::get('/all/roles', 'allRoles')->name('all.roles');
        Route::get('/add/roles', 'addRoles')->name('add.roles');
        Route::post('/store/roles', 'storeRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'editRoles')->name('edit.roles');
        Route::post('/update/roles/{id}', 'updateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}', 'deleteRoles')->name('delete.roles');


        Route::get('/add/roles/permission', 'addRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'rolesPermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission', 'allRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'adminEditRolePermission')->name('admin.edit.roles');
        Route::post('/admin/update/roles/{id}', 'adminUpdateRolePermission')->name('admin.update.roles');
        Route::get('/admin/delete/roles/{id}', 'adminDeleteRolePermission')->name('admin.delete.roles');
    });

      // For Admin User All Route
      Route::controller(AdminController::class)->group(function(){
        Route::get('/all/admin', 'allAdmin')->name('all.admin');
        Route::get('/add/admin', 'addAdmin')->name('add.admin');
        Route::post('/store/admin', 'storeAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'editAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'updateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}', 'deleteAdmin')->name('delete.admin');
    });
});

//  For Agent Group Midleware
Route::middleware(['auth','roles:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');

});

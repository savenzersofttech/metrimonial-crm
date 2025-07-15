<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;


use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\services\WelcomeCallController;
use App\Http\Controllers\OngoingServicesController;
use App\Http\Controllers\SearchSendProfilesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileAssignmentController;


Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return '✅ All caches cleared successfully!';
}); 


Route::get('/get-country', function () {
    $path = public_path('assets/custom/country-list.json');
    return response()->file($path);
})->name('get-countrys');

// Root route: Redirect based on user role
Route::get('/', function () {
    if (Auth::check()) {
        return match (Auth::user()->role) {
            'super-admin' => redirect()->route('admin.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            'sales' => redirect()->route('sales.dashboard'),
            'services' => redirect()->route('services.dashboard'),
            default => redirect()->route('login'),
        };
    }
    return redirect()->route('login');
});

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::resource('profiles', CustomerProfileController::class);
    Route::get('/profiles/pdf', [CustomerProfileController::class, 'downloadProfilePdf'])->name('profiles.pdf');
    Route::resource('employees', EmployeesController::class);
    Route::get('employees/xxx', [EmployeesController::class, 'index'])->name('employees.assign');

    //ROLES AMD PERMISSIONS
    Route::prefix('permissions')->name('permissions.')->group(function () {
    Route::get('/', [PermissionController::class, 'index'])->name('index');
    Route::get('/create', [PermissionController::class, 'create'])->name('create');
    Route::post('/', [PermissionController::class, 'store'])->name('store');
    Route::get('/{role}/edit', [PermissionController::class, 'edit'])->name('edit'); 
    Route::put('/{role}', [PermissionController::class, 'update'])->name('update');
    });

     Route::resource('assigns', ProfileAssignmentController::class);






});

// Sales routes
Route::middleware(['auth'])->prefix('sales')->name('sales.')->group(function () {
    Route::get('/dashboard', [SalesController::class, 'index'])->name('dashboard');
    // Route::get('/', [SalesController::class, 'index'])->name('index');
});

// Services routes
Route::middleware(['auth'])->prefix('services')->name('services.')->group(function () {
    Route::get('/dashboard', [ServicesController::class, 'dashboard'])->name('dashboard');
    Route::resource('welcome-calls', WelcomeCallController::class);
        Route::resource('ongoing-services', OngoingServicesController::class);
        Route::resource('profile-reports', SearchSendProfilesController::class);
        Route::get('/profile-reports-z',[SearchSendProfilesController::class,'index'])->name('profile-reports.send');

        

});


// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

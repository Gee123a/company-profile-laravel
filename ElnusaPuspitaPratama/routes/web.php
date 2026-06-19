<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Public routes (no auth required)
Route::get('/', function () {
    $featuredProjects = \App\Models\Project::with('client', 'projectManager')
        ->orderBy('budget', 'desc')
        ->take(3)
        ->get();
    $reviews = \App\Models\Review::orderBy('created_at', 'desc')->take(6)->get();
    return view('home', compact('featuredProjects', 'reviews'));
})->name('home');

Route::get('/project',[ProjectController::class, 'index'])->name('projects.index');
Route::get('/featured', [ProjectController::class, 'featured'])->name('projects.featured');
Route::get('/project/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    \App\Models\Inquiry::create($validated);

    return back()->with('success', 'Thank you! Your message has been received. Our team will contact you shortly.');
});

// Admin Routes (protected with auth middleware)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Projects
    Route::get('/projects', [AdminController::class, 'projectIndex'])->name('admin.projects.index');
    Route::get('/projects/search', [AdminController::class, 'projectSearch'])->name('admin.projects.search'); 
    Route::get('/projects/create', [AdminController::class, 'projectCreate'])->name('admin.projects.create');
    Route::post('/projects', [AdminController::class, 'projectStore'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [AdminController::class, 'projectEdit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [AdminController::class, 'projectUpdate'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [AdminController::class, 'projectDestroy'])->name('admin.projects.destroy');
    
    // Employees
    Route::get('/employees', [AdminController::class, 'employeeIndex'])->name('admin.employees.index');
    Route::get('/employees/search', [AdminController::class, 'employeeSearch'])->name('admin.employees.search');
    Route::get('/employees/create', [AdminController::class, 'employeeCreate'])->name('admin.employees.create');
    Route::post('/employees', [AdminController::class, 'employeeStore'])->name('admin.employees.store');
    Route::get('/employees/{id}/edit', [AdminController::class, 'employeeEdit'])->name('admin.employees.edit');
    Route::put('/employees/{id}', [AdminController::class, 'employeeUpdate'])->name('admin.employees.update');
    Route::delete('/employees/{id}', [AdminController::class, 'employeeDestroy'])->name('admin.employees.destroy');
    
    // Reviews
    Route::get('/reviews', [AdminController::class, 'reviewIndex'])->name('admin.reviews.index');
    Route::get('/reviews/search', [AdminController::class, 'reviewSearch'])->name('admin.reviews.search');
    Route::get('/reviews/create', [AdminController::class, 'reviewCreate'])->name('admin.reviews.create');
    Route::post('/reviews', [AdminController::class, 'reviewStore'])->name('admin.reviews.store');
    Route::get('/reviews/{id}/edit', [AdminController::class, 'reviewEdit'])->name('admin.reviews.edit');
    Route::put('/reviews/{id}', [AdminController::class, 'reviewUpdate'])->name('admin.reviews.update');
    Route::delete('/reviews/{id}', [AdminController::class, 'reviewDestroy'])->name('admin.reviews.destroy');
});

// Breeze auth routes are auto-included from routes/auth.php
require __DIR__.'/auth.php';

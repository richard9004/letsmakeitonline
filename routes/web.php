<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/terms-of-service', [HomeController::class, 'terms_of_service'])->name('terms-of-service');
Route::get('/tools', [ToolsController::class, 'index'])->name('tools');
Route::get('/tools/{categoryRoute}', [ToolsController::class, 'tool_subcategories'])->name('tools.category');
Route::get('/tools/{categoryRoute}/{subCategoryRoute}', [ToolsController::class, 'tool_templates'])->name('tools.templates');
Route::get('/tools/{categoryRoute}/{subCategoryRoute}/{toolRoute}', [ToolsController::class, 'tool_page'])->name('tools.tool_page');

Route::post('/export-docx', [ToolsController::class, 'exportDocx'])->name('export-docx');
Route::post('/contact-form', [HomeController::class, 'contact_form'])->name('contact-form');

// web.php



Route::get('/tools/resume-builder/nhs-cv-templates', [ToolsController::class, 'nhs_cv_templates'])->name('nhs-cv-templates');

// Allow only guests (unauthenticated users) to access the login and registration routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
   
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add more authenticated routes if needed
    Route::get('/listing-tools-categories', [ToolsController::class, 'listing_tools_categories'])->name('listing-tools-categories');
    Route::get('/create-tool-category', [ToolsController::class, 'create_tool_category'])->name('create-tool-category');
    Route::post('/save_tools_category', [ToolsController::class, 'save_tools_category'])->name('save_tools_category');
    Route::get('/edit-tool-category/{id}', [ToolsController::class, 'edit_tool_category'])->name('edit-tool-category');
    Route::get('/edit-tool-subcategory/{id}', [ToolsController::class, 'edit_tool_subcategory'])->name('edit-tool-subcategory');
    Route::put('/update_tool_category/{id}', [ToolsController::class, 'update_tool_category'])->name('update_tool_category');
    Route::get('/listing-tools-subcategories', [ToolsController::class, 'listing_tools_subcategories'])->name('listing-tools-subcategories');
    Route::get('/create-tool', [ToolsController::class, 'create_tool'])->name('create-tool');
    Route::get('/create-tool-subcategory', [ToolsController::class, 'create_tool_subcategory'])->name('create-tool-subcategory');
    Route::post('/save_tools_subcategory', [ToolsController::class, 'save_tools_subcategory'])->name('save_tools_subcategory');
    Route::put('/update_tool_subcategory/{id}', [ToolsController::class, 'update_tool_subcategory'])->name('update_tool_subcategory');
    Route::get('/listing-tools', [ToolsController::class, 'listing_tools'])->name('listing-tools');
    Route::post('/save_tool', [ToolsController::class, 'save_tool'])->name('save_tool');
    Route::get('/edit-tool/{id}', [ToolsController::class, 'edit_tool'])->name('edit-tool');
    Route::put('/update_tool/{id}', [ToolsController::class, 'update_tool'])->name('update_tool');
    
    
    
    
    
});



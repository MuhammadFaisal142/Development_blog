<?php
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Models\Category;
use App\Models\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
cl*/
Auth::routes();




Route::get('/home', [HomeController::class, 'index'])->name('home');


// Front End Routes
Route::get('/', [FrontEndController::class, 'home'])->name('website');
Route::get('/about', [FrontEndController::class, 'about'])->name('website.about');
Route::get('/category/{slug}', [FrontEndController::class, 'category'])->name('website.category');
Route::get('/tag/{slug}', [FrontEndController::class, 'tag'])->name('website.tag');

Route::get('/post/{slug}', [FrontEndController::class, 'post'])->name('website.post');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('website.contact');
Route::get('/contact/', [FrontEndController::class, 'contact'])->name('website.contact');
Route::post('/contact/', [FrontEndController::class, 'send_message'])->name('website.contact');




////////////// Admin DashBoard routes ///////////////
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');


////////////////Admin Panel Category Routes //////////////


Route::get('/admin/category', [CategoryController::class, 'index'])->name('category.index');

Route::get('/admin/category/create', [CategoryController::class, 'create_category'])->name('category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store_category'])->name('category.store');
Route::any('/admin/category/edit/{id}', [CategoryController::class, 'edit_category'])->name('category.edit');
Route::any('/admin/category/update/', [CategoryController::class, 'update_category'])->name('category.update');
Route::any('/admin/category/show/{id}', [CategoryController::class, 'show_category'])->name('category.show');
Route::any('/admin/category/delete/{id}', [CategoryController::class, 'Delete_category'])->name('category.delete');


////////////////Admin Panel tags Routes //////////////

Route::get('/admin/tags', [TagController::class, 'index'])->name('tag.index');//done
Route::get('/admin/tags/create', [TagController::class, 'create'])->name('tag.create');//done
Route::post('/admin/tags/store', [TagController::class, 'store'])->name('tag.store');//done
Route::any('/admin/tags/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');//done
Route::any('/admin/tags/update/', [TagController::class, 'update'])->name('tag.update');//done
Route::any('/admin/tags/destroy/{id}', [TagController::class, 'destroy'])->name('tag.destroy');//done
// Route::any('/user', [UserController::class, 'destroy'])->name('tag.destroy');//done



////////////////Admin Panel post Routes //////////////

Route::get('/admin/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/admin/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/admin/posts/store', [PostController::class, 'store'])->name('post.store');
Route::any('/admin/posts/show/{id}', [PostController::class, 'show'])->name('post.show');
Route::any('/admin/posts/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::any('/admin/posts/update/', [PostController::class, 'update'])->name('post.update');
Route::any('/admin/posts/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');



////////////////Admin Panel user Routes //////////////

Route::get('/admin/user/', [UserController::class, 'index'])->name('user.index');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
Route::any('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::any('/admin/user/update/', [UserController::class, 'update'])->name('user.update');
Route::any('/admin/user/profile/update/', [UserController::class, 'profile_update'])->name('user.profile.update');
Route::any('/admin/user/profile/', [UserController::class, 'profile'])->name('user.profile');
Route::any('/admin/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');


////////////////Admin Panel setting Routes //////////////

Route::get('/admin/setting/edit/', [SettingController::class, 'edit'])->name('setting.index');
Route::any('/admin/setting/update/', [SettingController::class, 'update'])->name('setting.update');



////////////////Admin Panel contact Routes //////////////

Route::get('/admin/contact/', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/show/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::any('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');


////////////////Admin Panel contact Routes //////////////

Route::get('/admin/subscriber/', [ContactController::class, 'index'])->name('subscriber.index');
Route::any('/subscriber/delete/{id}', [ContactController::class, 'destroy'])->name('subscriber.destroy');

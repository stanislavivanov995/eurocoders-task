<?php

use Illuminate\Support\Facades\Route;
use App\Domain\Home\HomeController;
use App\Domain\Auth\Login\LoginController;
use App\Domain\Auth\Logout\LogoutController;
use App\Domain\Auth\Register\RegisterController;
use App\Domain\Image\ShowImageUpload\ShowImageUploadController;
use App\Domain\Image\UploadImage\UploadImageController;
use App\Domain\Image\ListImages\ListImagesController;
use App\Domain\Image\ShowImage\ShowImageController;
use App\Domain\Image\DeleteImage\DeleteImageController;
use App\Domain\Comment\CreateCommentController;
use App\Domain\User\ListUsers\ListUsersController;
use App\Domain\Ticket\ShowTicketForm\ShowTicketFormController;
use App\Domain\Ticket\StoreTicket\StoreTicketController;
use App\Domain\Profile\ShowProfile\ShowProfileController;
use App\Domain\Profile\UpdateProfile\UpdateProfileController;
use App\Domain\Admin\Home\HomeController as AdminHomeController;
use App\Domain\Admin\Auth\LoginController as AdminLoginController;
use App\Domain\Admin\Image\ImagesController as AdminImagesController;
use App\Domain\Admin\Comment\CommentsController as AdminCommentsController;
use App\Domain\Admin\User\UsersController as AdminUsersController;

Route::get('/', HomeController::class)->name('home');
Route::get('/list-images', ListImagesController::class)->name('list.images');
Route::get('/show-image/{id}', ShowImageController::class)->name('show.image');
Route::get('list-users', ListUsersController::class)->name('list.users');
Route::get('contacts', ShowTicketFormController::class)->name('contacts');
Route::post('store-ticket', StoreTicketController::class)->name('store.ticket');
Route::get('admin-login', [AdminLoginController::class, 'showLogin'])->name('admin.showLogin');
Route::post('admin-login', [AdminLoginController::class, 'doLogin'])->name('admin.doLogin');

Route::middleware(['guest'])->group(function () {
    Route::post('register', RegisterController::class)->name('register');
    Route::post('login', LoginController::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('show-image-upload', ShowImageUploadController::class)->name('show.image.upload');
    Route::post('image-upload', UploadImageController::class)->name('image.upload');
    Route::post('logout', LogoutController::class)->name('logout');
    Route::post('delete-image/{id}', DeleteImageController::class)->name('delete.image');
    Route::post('create-comment', CreateCommentController::class)->name('create.comment');
    Route::get('profile', ShowProfileController::class)->name('show.profile');
    Route::post('profile', ShowProfileController::class)->name('show.profile');
    Route::post('profile-update', UpdateProfileController::class)->name('update.profile');
});

Route::middleware(['admin'])->group(function () {
    Route::get('admin', AdminHomeController::class)->name('admin.home');
    Route::get('admin-images', AdminImagesController::class)->name('admin.images');
    Route::get('admin-users', [AdminUsersController::class, 'listUsers'])->name('admin.users');
    Route::post('admin-delete-comment/{id}', [AdminCommentsController::class, 'deleteComment'])->name('delete.comment');
    Route::post('admin-users-delete/{id}', [AdminUsersController::class, 'deleteUser'])->name('admin.users.delete');
    // Route::get('/admin/users/{id}/images', [AdminUsersController::class, 'getUserImages']);
    Route::get('/admin/users/{id}/images', [AdminUsersController::class, 'getUserImages'])->name('admin.users.images');
});







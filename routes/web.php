<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\TicketBookingController;
use App\Models\Package;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouEmail;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

Route::get('/', [IndexController::class, 'home'])->name('homepage');


Route::get('/su-kien', [IndexController::class, 'event'])->name('event');
Route::get('/chi-tiet-su-kien/{slug}', [IndexController::class, 'detail'])->name('detail');
Route::get('/lien-he', [IndexController::class, 'about'])->name('about');
// Route::get('/thanh-toan', [IndexController::class, 'payment'])->name('payment');
// Route::get('/thanh-toan-thanh-cong', [IndexController::class, 'success'])->name('success');

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/package/statistics', [HomeController::class, 'statistics'])->name('package.statistics');

//admin routes
Route::resource('event', EventController::class);
Route::resource('info', InfoController::class);
Route::resource('package', PackageController::class);
Route::resource('about', ContactController::class);
Route::resource('order', OrderController::class);



Route::post('/update-image-event-ajax', [EventController::class, 'update_image_event_ajax'])->name('update-image-event-ajax');
Route::post('/update-image2-event-ajax', [EventController::class, 'update_image2_event_ajax'])->name('update-image2-event-ajax');
Route::post('/update-image3-event-ajax', [EventController::class, 'update_image3_event_ajax'])->name('update-image3-event-ajax');




Route::post('/delete-image-event-ajax', [EventController::class, 'delete_image_event_ajax'])->name('delete-image-event-ajax');
Route::post('/delete-image2-event-ajax', [EventController::class, 'delete_image2_event_ajax'])->name('delete-image2-event-ajax');
Route::post('/delete-image3-event-ajax', [EventController::class, 'delete_image3_event_ajax'])->name('delete-image3-event-ajax');


Route::get('/trangthai-choose', [EventController::class, 'trangthai_choose'])->name('trangthai-choose');
Route::get('/goi-choose', [PackageController::class, 'goi_choose'])->name('goi-choose');
Route::get('/about-choose', [ContactController::class, 'about_choose'])->name('about-choose');

Route::post('/submitBookingForm', [TicketBookingController::class, 'submit_Booking_Form'])->name('submitBookingForm');
Route::get('/thanh-toan', [TicketBookingController::class, 'showBookingForm'])->name('payment');
Route::post('/submitForm', [TicketBookingController::class, 'submit_Form'])->name('submitForm');
Route::post('/charge', [TicketBookingController::class, 'charge'])->name('charge');
Route::get('/thanh-toan-vnpay-thanh-cong', [TicketBookingController::class, 'result_vnpay'])->name('success_vnpay');
Route::get('/send-thankyou-email', [TicketBookingController::class, 'sendThankYouEmail']);



Route::get('/contact', [ContactController::class, 'showContactForm']);
Route::post('/contact', [ContactController::class, 'submitContactForm']);
Route::get('/tin-nhan-da-gui', [ContactController::class, 'sent'])->name('about.sent');
Route::delete('sent/{id}', [ContactController::class, 'destroy_sent'])->name('about.destroy_sent');




Route::post('/charge-momo', [TicketBookingController::class, 'charge_momo'])->name('charge-momo');
Route::get('/thanh-toan-thanh-cong', [TicketBookingController::class, 'result'])->name('success');



Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send-email');
Route::get('/admin/about/email', function () {
    $to = request()->query('to');
    return view('admin.about.email', compact('to'));
})->name('admin.about.email');




// Show the form to request a password reset link
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

// Send password reset email
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

// Show the form to reset the password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

// Update the password
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');

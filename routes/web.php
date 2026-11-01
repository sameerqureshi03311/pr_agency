<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\PublicWebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Agency Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicWebsiteController::class, 'home'])->name('home');
Route::get('/about', [PublicWebsiteController::class, 'about'])->name('about');
Route::get('/services', [PublicWebsiteController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PublicWebsiteController::class, 'serviceDetail'])->name('services.detail');
Route::get('/case-studies', [PublicWebsiteController::class, 'caseStudies'])->name('case-studies');
Route::get('/case-studies/{slug}', [PublicWebsiteController::class, 'caseStudyDetail'])->name('case-studies.detail');
Route::get('/testimonials', [PublicWebsiteController::class, 'testimonials'])->name('testimonials');
Route::get('/faq', [PublicWebsiteController::class, 'faq'])->name('faq');
Route::get('/contact', [PublicWebsiteController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicWebsiteController::class, 'submitEnquiry'])->name('contact.submit');
Route::get('/privacy-policy', [PublicWebsiteController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PublicWebsiteController::class, 'terms'])->name('terms');

/*
|--------------------------------------------------------------------------
| Admin Portal & CMS Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Auth
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Services Management
        Route::resource('services', ServiceController::class)->except(['show']);

        // Case Studies Management
        Route::resource('case-studies', CaseStudyController::class)->except(['show']);

        // Testimonials Management
        Route::resource('testimonials', TestimonialController::class)->except(['show']);

        // Inquiries Management
        Route::get('/enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
        Route::get('/enquiries/{enquiry}', [EnquiryController::class, 'show'])->name('enquiries.show');
        Route::post('/enquiries/{enquiry}/status', [EnquiryController::class, 'updateStatus'])->name('enquiries.status');
        Route::post('/enquiries/{enquiry}/notes', [EnquiryController::class, 'addNote'])->name('enquiries.notes');
        Route::delete('/enquiries/{enquiry}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');

        // FAQ Management
        Route::resource('faqs', FaqController::class)->except(['show']);

        // Page Content Management
        Route::get('/content', [PageContentController::class, 'index'])->name('content.index');
        Route::post('/content', [PageContentController::class, 'update'])->name('content.update');

        // Website Settings
        Route::get('/settings', [SiteSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
    });
});

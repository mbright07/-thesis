<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddJobComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditJobCompoent;
use App\Http\Livewire\Admin\AdminHomeCategoryCompoent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminJobComponentnent;
use App\Http\Livewire\Admin\AdminRecruitmentComponent;
use App\Http\Livewire\Admin\AdminRecruitmentDetailsComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\RecruitmentComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserChangePasswordCompponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserRecruitmentDetailsComponent;
use App\Http\Livewire\User\UserRecruitmentsComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\WishlistComponent;
use App\Models\Contact;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', HomeComponent::class);

Route::get('/blog', BlogComponent::class);

Route::get('/bookmark', CartComponent::class)->name('job.bookmark');

Route::get('/recruitment', RecruitmentComponent::class)->name('recruitment');

Route::get('job/{slug}', DetailsComponent::class)->name('job.details');

Route::get('/job-category/{category_slug}/{sub_category_slug?}', CategoryComponent::class)->name('job.category');

Route::get('/search', SearchComponent::class)->name('job.search');

Route::get('/wishlist', WishlistComponent::class)->name('job.wishlist');

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

Route::get('/contact-us', ContactComponent::class)->name('contact-us');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('user/recruitments', UserRecruitmentsComponent::class)->name('user.recruitments');
    Route::get('user/recruitments/{recruitment_id}', UserRecruitmentDetailsComponent::class)->name('user.recruitmentdetails');
    Route::get('/user/review/{recruitment_job_id}', UserReviewComponent::class)->name('user.review');
    Route::get('user/change-password', UserChangePasswordCompponent::class)->name('user.changepassword');
    Route::get('/user/profile', UserProfileComponent::class)->name('user.profile');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}/{sub_category_slug?}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/jobs', AdminJobComponentnent::class)->name('admin.jobs');
    Route::get('/admin/job/add', AdminAddJobComponent::class)->name('admin.addjob');
    Route::get('/admin/job/edit/{job_slug}', AdminEditJobCompoent::class)->name('admin.editjob');

    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slider_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', AdminHomeCategoryCompoent::class)->name('admin.homecategories');

    Route::get('/admin/recruitments', AdminRecruitmentComponent::class)->name('admin.recruitments');
    Route::get('/admin/recruitments/{recruitment_id}', AdminRecruitmentDetailsComponent::class)->name('admin.recruitmentdetails');

    Route::get('/admin/contact-us', AdminContactComponent::class)->name('admin.contact');

    Route::get('/admin/settings', AdminSettingComponent::class)->name('admin.settings');
});

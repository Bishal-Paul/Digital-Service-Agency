<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BannarController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SiteInfoController;
use App\Models\Brand;
use App\Models\Pricing;
use App\Models\ServiceCategory;
use App\Models\Testimonial;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\VendorController;
use App\Models\Coupon;
use Stripe\StripeClient;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/admin-dashboard', function () {
    return view('backend.dashboard');
})->name('admindashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    $pricing = Pricing::all();
    $test = Testimonial::all();
    $work = Work::all();
    $brand = Brand::all();
    $cat = ServiceCategory::all();
    return view('frontend.index', compact('pricing', 'test', 'work', 'brand','cat'));
})->name('userdashboard');


// FRONTEND
Route::get('/', [FrontendController::class, 'index']);
Route::get('/master', [FrontendController::class, 'master']);
Route::get('/pricing', [FrontendController::class, 'pricing']);
Route::get('/testimonial', [FrontendController::class, 'testimonial']);
Route::get('/work', [FrontendController::class, 'work']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/blog', [FrontendController::class, 'blog']);
Route::middleware(['auth:sanctum', 'verified'])->get('/checkout-complete', function () {
    return view('frontend.complete_checkout');
});

// START PROJECT ROUTES
Route::get('/start-project', [FrontendController::class, 'StartProject']);
Route::post('/submit-project', [FrontendController::class, 'SubmitProject']);
Route::get('/view-submitted-project', [FrontendController::class, 'ViewSubmitedProject']);
Route::get('/delete-project/{id}', [FrontendController::class, 'DeleteProject']);
Route::get('/view-full-project/{id}', [FrontendController::class, 'ViewFullProject']);


// SERVICE CATEGORY
Route::get('/add-service-category', [ServiceController::class, 'AddServiceCat']);
Route::post('/post-service-category', [ServiceController::class, 'PostServiceCat']);
Route::get('/view-service-category', [ServiceController::class, 'ViewServiceCat']);
Route::get('/edit-service-category/{id}', [ServiceController::class, 'EditServiceCat']);
Route::post('/update-service-category', [ServiceController::class, 'UpdateServiceCat']);
Route::get('/delete-service-category/{id}', [ServiceController::class, 'DeleteServiceCat']);

// SERVICE INNER
Route::get('/add-service-inner', [ServiceController::class, 'AddServiceInner']);
Route::post('/post-service-inner', [ServiceController::class, 'PostServiceInner']);
Route::get('/view-service-inner', [ServiceController::class, 'ViewServiceInner']);
Route::get('/edit-service-inner/{id}', [ServiceController::class, 'EditServiceInner']);
Route::post('/update-service-inner', [ServiceController::class, 'UpdateServiceInner']);
Route::get('/delete-service-inner/{id}', [ServiceController::class, 'DeleteServiceInner']);
Route::get('/services', [ServiceController::class, 'Services']);
Route::get('/service/{id}', [ServiceController::class, 'Service']);
Route::get('/single-service/{id}', [ServiceController::class, 'SingleService']);

// PRICING
Route::get('/add-pricing', [PricingController::class, 'AddPricing']);
Route::post('/post-pricing', [PricingController::class, 'PostPricing']);
Route::get('/view-pricing', [PricingController::class, 'ViewPricing']);
Route::get('/delete-pricing/{id}', [PricingController::class, 'DeletePricing']);
Route::get('/edit-pricing/{id}', [PricingController::class, 'EditPricing']);
Route::post('/update-pricing', [PricingController::class, 'UpdatePricing']);

// TESTIMONIAL
Route::get('/add-testimonial', [TestimonialController::class, 'AddTestimonial']);
Route::post('/post-testimonial', [TestimonialController::class, 'PostTestimonial']);
Route::get('/view-testimonial', [TestimonialController::class, 'ViewTestimonial']);
Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'EditTestimonial']);
Route::post('/update-testimonial', [TestimonialController::class, 'UpdateTestimonial']);
Route::get('/delete-testimonial/{id}', [TestimonialController::class, 'DeleteTestimonial']);

//RECENT WORKS
Route::get('/add-work', [TestimonialController::class, 'AddWork']);
Route::post('/post-work', [TestimonialController::class, 'PostWork']);
Route::get('/view-work', [TestimonialController::class, 'ViewWork']);
Route::get('/edit-work/{id}', [TestimonialController::class, 'EditWork']);
Route::post('/update-work', [TestimonialController::class, 'UpdateWork']);
Route::get('/delete-work/{id}', [TestimonialController::class, 'DeleteWork']);
Route::get('/work-details/{id}', [TestimonialController::class, 'WorkDetails']);

//CONTACT
Route::post('/post-contact', [TestimonialController::class, 'PostContact']);
Route::get('/view-contact', [TestimonialController::class, 'ViewContact']);

//BRANDS
Route::get('/add-brand', [BrandController::class, 'AddBrand']);
Route::post('/post-brand', [BrandController::class, 'PostBrand']);
Route::get('/view-brand', [BrandController::class, 'ViewBrand']);
Route::get('/delete-brand/{id}', [BrandController::class, 'DeleteBrand']);

// BLOGS
Route::get('/add-blog', [BlogController::class, 'AddBlog']);
Route::post('/post-blog', [BlogController::class, 'PostBlog']);
Route::get('/view-blog', [BlogController::class, 'ViewBlog']);
Route::get('/delete-blog/{id}', [BlogController::class, 'DeleteBlog']);
Route::get('/edit-blog/{id}', [BlogController::class, 'EditBlog']);
Route::post('/update-blog', [BlogController::class, 'UpdateBlog']);
Route::get('/single-blog/{id}', [BlogController::class, 'SingleBlog']);
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::post('/blog-comment', [BlogController::class, 'BlogComment']);
//Route::get('/search-blog', [BlogController::class, 'SearchBlog']);

// Bannar Part
Route::get('/add-bannar', [BannarController::class, 'AddBannar'])->name('AddBannar');
Route::post('/post-bannar', [BannarController::class, 'PostBannar'])->name('PostBannar');
Route::get('/view-bannar', [BannarController::class, 'ViewBannar'])->name('ViewBannar');
Route::get('/delete-bannar/{id}', [BannarController::class, 'DeleteBannar'])->name('DeleteBannar');

//Video Part
Route::get('/add-video', [BannarController::class, 'AddVideo'])->name('AddVideo');
Route::post('/post-video', [BannarController::class, 'PostVideo'])->name('PostVideo');
Route::get('/view-video', [BannarController::class, 'ViewVideo'])->name('ViewVideo');
Route::get('/delete-video/{id}', [BannarController::class, 'DeleteVideo'])->name('DeleteVideo');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USERS
Route::get('/users', [BackendController::class, 'Users']);
Route::get('/change-role/{id}', [BackendController::class, 'ChangeRole']);
Route::post('/update-user-role', [BackendController::class, 'UpdateRole']);

// LOGIN WITH SOCIAL MEDIA

//GOOGLE LOGIN
Route::get('/login/google', [LoginController::class, 'RedirectToGoogle'])->name('login/google');
Route::get('/login/google/callback', [LoginController::class, 'HandleGoogleCallback']);
//Facebook LOGIN
Route::get('/login/facebook', [LoginController::class, 'RedirectToFacebook'])->name('login/facebook');
Route::get('/login/facebook/callback', [LoginController::class, 'HandleFacebookCallback']);
//GITHUB LOGIN
Route::get('/login/github', [LoginController::class, 'RedirectToGithub'])->name('login/github');
Route::get('/login/github/callback', [LoginController::class, 'HandleGithubCallback']);
//Linkedin LOGIN
Route::get('/login/linkedin', [LoginController::class, 'RedirectToLinkedin'])->name('login/linkedin');
Route::get('/login/linkedin/callback', [LoginController::class, 'HandleLinkedinCallback']);


// VENDOR ROUTES & START SELLING
Route::middleware(['auth:sanctum', 'verified'])->get('/vendor-dashboard', function () {
    return view('vendor.dashboard');
})->name('vendordashboard');
Route::get('/register-to-sell', [VendorController::class, 'RegisterToSell']);
Route::post('/post-vendor-info', [VendorController::class, 'PostVendor']);
Route::get('/add-your-work', function () {
    $cat = ServiceCategory::all();
    return view('frontend.add_your_work', compact('cat'));
})->name('AddYourWork');
Route::post('/submit-work', [VendorController::class, 'SubmitWork']);
Route::get('/welcome-to-dsa', [VendorController::class, 'WelcomeToDSA'])->name('WelcomeToDSA');

Route::get('/view-seller-account', [VendorController::class, 'ViewSellerAccount'])->name('ViewSellerAccount');
Route::get('/view-seller-works', [VendorController::class, 'ViewSellerWorks'])->name('ViewSellerWorks');

// Site Information
Route::get('/add-info', [SiteInfoController::class, 'AddInfo']);
Route::post('/post-info', [SiteInfoController::class, 'PostInfo']);
Route::get('/view-info', [SiteInfoController::class, 'ViewInfo']);
Route::get('/edit-info/{id}', [SiteInfoController::class, 'EditInfo']);
Route::post('/update-info', [SiteInfoController::class, 'UpdateInfo']);
Route::get('/delete-info/{id}', [SiteInfoController::class, 'DeleteInfo']);

//Coupon
Route::get('/add-coupon', [CouponController::class, 'AddCoupon']);
Route::post('/post-coupon', [CouponController::class, 'PostCoupon']);
Route::get('/view-coupon', [CouponController::class, 'ViewCoupon']);
Route::get('/delete-coupon/{id}', [CouponController::class, 'DeleteCoupon']);
Route::get('/edit-coupon/{id}', [CouponController::class, 'EditCoupon']);
Route::post('/update-coupon', [CouponController::class, 'UpdateCoupon']);
Route::post('/check-coupon', [CouponController::class, 'CheckCoupon']);

// Checkout
Route::get('/start-plan/{id}', [CheckoutController::class, 'StartPlan']);
Route::post('/checkout', [CheckoutController::class, 'Checkout']);
//Ajax
Route::get('/api/get-state-list/{id}', [CheckoutController::class, 'GetState']);
Route::get('/api/get-city-list/{id}', [CheckoutController::class, 'GetCity']);

// BotMan Chat Box
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

//Order Details BACKEND
Route::get('/view-all-orders', [CheckoutController::class, 'ViewOrders']);
Route::get('/order-details/{id}', [CheckoutController::class, 'OrderDetails']);
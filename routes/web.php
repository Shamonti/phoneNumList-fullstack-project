<?php

use App\Http\Controllers\Admin\Payment\PayPalPaymentController;
use App\Http\Controllers\UserAuth\ForgotPasswordController;
use App\Http\Controllers\User\Searching\TypeaheadController;
use App\Http\Controllers\User\SocialController;
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




            //public home page
Route::get('/',[
    'uses' => 'App\Http\Controllers\PublicController@home',
    'as' => '/',
]);
Route::get('/category/{id}',[
    'uses' => '\App\Http\Controllers\PublicController@category',
    'as'   => 'category',
]);
Route::get('/convert-to-json', function () {
    return App\Http\Controllers\PublicController::paginate(5);
});
Route::get('/people.{id}',[
    'uses' => '\App\Http\Controllers\PublicController@user',
    'as'   => 'user',
]);

Route::get('/userSearch',[
    'uses' => '\App\Http\Controllers\PublicController@userSearch',
    'as'   => 'userSearch',
]);

Route::get('/country/{id}',[
    'uses' => '\App\Http\Controllers\PublicController@country',
    'as'   => 'country',
]);
Route::get('/phonelistUserRegister',[
    'uses' => 'App\Http\Controllers\User\UserController@userRegister',
    'as' => '/phonelistUserRegister',
]);
Route::post('/phonelistUserRegisterAdd',[
    'uses' => 'App\Http\Controllers\User\UserController@newUser',
    'as' => '/phonelistUserRegisterAdd',
]);
Route::get('/phonelistUserLogin',[
    'uses' => 'App\Http\Controllers\User\UserController@userLogin',
    'as' => '/phonelistUserLogin',
]);
Route::post('/phonelistUserLoginAuth',[
    'uses' => 'App\Http\Controllers\User\UserController@userAuth',
    'as' => '/phonelistUserLoginAuth',
]);
/** terms and services*/
Route::get('/terms-of-service',[
    'uses' => 'App\Http\Controllers\User\FooterController@termsAndServices',
    'as' => 'termsAndServices',
]);
/** privacy policy*/
Route::get('/privacy_policy',[
    'uses' => 'App\Http\Controllers\User\FooterController@privacyPolicy',
    'as' => 'privacyPolicy',
]);
/** refund policy*/
Route::get('/refund',[
    'uses' => 'App\Http\Controllers\User\FooterController@refund',
    'as' => 'refund',
]);





/** Google OAuth routes */
Route::get('/auth/google',[
    'uses' => 'App\Http\Controllers\User\GoogleController@handleGoogleRedirect',
    'as' => '/auth/google',
]);
Route::get('user/google/callback',[
    'uses' => 'App\Http\Controllers\User\GoogleController@handleGoogleCallback',
    'as' => 'user/google/callback',
]);
Route::get('/loginWithGoogle{id}',[
    'uses' => 'App\Http\Controllers\User\GoogleController@handleGoogleCallbackRegister',
    'as' => '/loginWithGoogle',
]);

/** Email OAuth routes */
Route::post('/user/email/callback',[
    'uses' => 'App\Http\Controllers\User\EmailController@handleEmailCallback',
    'as' => '/user/email/callback',
]);


/** Facebook OAuth routes */
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

/** search routes */
Route::get('/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);
//Route::resource('/autocomplete-search-data', TypeaheadController::class);


/** search routes in people page*/
    /** name search*/
        Route::get('/autocomplete-people-search', [TypeaheadController::class, 'autocompletePeopleSearch']);
        //Route::resource('/autocomplete-people-search-data', TypeaheadController::class);

    /** location search*/
        Route::get('/autocomplete-location', [TypeaheadController::class, 'autocompleteLocation']);
        //Route::resource('/autocomplete-location-data', TypeaheadController::class);
    /** hometown search*/
        Route::get('/autocomplete-hometown', [TypeaheadController::class, 'autocompleteHometown']);
    /** Country search*/
        Route::get('/autocomplete-country', [TypeaheadController::class, 'autocompleteCountry']);


Route::get('searchPeople{id}',[
    'uses' => 'App\Http\Controllers\User\Searching\TypeaheadController@searchPeople',
    'as'   => 'searchPeople',
]);

            //import-export Admin Dashboard


Route::get('/welcome',[
    'uses' => 'App\Http\Controllers\PublicController@index',
    'as' => 'public.Dashboard',
]);
Route::get('/file-import-export', [
    'uses' => '\App\Http\Controllers\AdminController@fileImportExport',
    'as' => 'file-import-export'
    ]);
Route::post('/file-import', [
    'uses' => '\App\Http\Controllers\AdminController@fileImport',
    'as' => 'file-import'
]);
Route::get('/file-export', [
    'uses' => '\App\Http\Controllers\AdminController@fileExport',
    'as' => 'file-export'
]);

Route::get('/customExport', [
    'uses' => '\App\Http\Controllers\User\Searching\DataSearch@customExport',
    'as' => 'customExport'
]);



Route::get('/selected-file-export{id}', [
    'uses' => '\App\Http\Controllers\AdminController@selectedfileExport',
    'as' => 'selected-file-export'
]);

Route::get('/convert-to-json', function () {
    return App\Models\PhoneList::paginate(5);
});


            //view all phoneList data from admin dashboard
            //manage edit update delete


Route::get('/edit-data/{id}',[
    'uses' => '\App\Http\Controllers\AdminController@editData',
    'as'   => 'edit-data',
]);
Route::post('/update-data',[
    'uses' => '\App\Http\Controllers\AdminController@updateData',
    'as'   => 'update-data',
]);
Route::get('/delete-data/{id}',[
    'uses' => '\App\Http\Controllers\AdminController@deleteData',
    'as'   => 'delete-data',
]);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('home');
Route::get('admin/home', '\App\Http\Controllers\HomeController@handleAdmin')->name('admin.route')->middleware('admin');



/** reset password */
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


/** product page */
Route::get('/product',[
    'uses' => '\App\Http\Controllers\Product\ProductController@product',
    'as'   => 'product',
]);
/** packages page */
Route::get('/pricing/packages',[
    'uses' => '\App\Http\Controllers\Packages\PackagesController@packages',
    'as'   => 'packages',
]);
/** careers page */
Route::get('/careers',[
    'uses' => '\App\Http\Controllers\Careers\CareersController@careers',
    'as'   => 'careers',
]);
/** contact page */
Route::get('/contact',[
    'uses' => '\App\Http\Controllers\Contact\ContactController@contact',
    'as'   => 'contact',
]);
/** about us page */
Route::get('/aboutUS',[
    'uses' => '\App\Http\Controllers\Contact\ContactController@aboutUS',
    'as'   => 'about',
]);



Route::get('people/{gender}',[
    'uses' => '\App\Http\Controllers\User\UserController@people_gender',
    'as'   => 'people.gender',
]);


/** user Dashboard */
Route::group(['middleware' => ['auth:sanctum', 'verified']], function (){


    Route::get('loggedInUser',[
        'uses' => '\App\Http\Controllers\User\UserController@dashboard',
        'as'   => 'loggedInUser',
    ]);

    Route::get('search',[
        'uses' => '\App\Http\Controllers\User\UserController@people',
        'as'   => 'people',
    ]);

    Route::get('/user/{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@user',
        'as'   => 'people.user',
    ]);

    Route::post('/people/fetch_data', '\App\Http\Controllers\User\UserController@peopleDataHistory')->name('peopleDataHistory');

    Route::post('/people/search/all-data', '\App\Http\Controllers\User\Searching\DataSearch@allSearchData')->name('all.search.data');

    //searching


    Route::get('peopleSearchById{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@peopleSearchById',
        'as'   => 'peopleSearchById',
    ]);

    Route::get('people-search',[
        'uses' => '\App\Http\Controllers\User\Searching\Combination@peopleSearchCombination',
        'as'   => 'people.search.combination',
    ]);
    Route::get('peopleSearch',[
        'uses' => '\App\Http\Controllers\User\UserController@peopleSearch',
        'as'   => 'peopleSearch',
    ]);
    Route::get('genderSearch{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@genderSearch',
        'as'   => 'genderSearch',
    ]);
    Route::get('relationshipSearch{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@relationshipSearch',
        'as'   => 'relationshipSearch',
    ]);
    Route::get('locationSearch',[
        'uses' => '\App\Http\Controllers\User\UserController@locationSearch',
        'as'   => 'locationSearch',
    ]);
    Route::get('hometownSearch',[
        'uses' => '\App\Http\Controllers\User\UserController@hometownSearch',
        'as'   => 'hometownSearch',
    ]);
    Route::get('countrySearch{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@countrySearch',
        'as'   => 'countrySearch',
    ]);




    Route::get('/settings/account',[
        'uses' => '\App\Http\Controllers\User\UserController@account',
        'as'   => 'account',
    ]);
    Route::get('/settings/plans',[
        'uses' => '\App\Http\Controllers\User\UserController@managePlan',
        'as'   => 'managePlan',
    ]);
    Route::get('/settings/billing',[
        'uses' => '\App\Http\Controllers\User\UserController@billing',
        'as'   => 'billing',
    ]);
    Route::post('/settings/billing/request',[
        'uses' => '\App\Http\Controllers\User\UserController@billingRequest',
        'as'   => 'billingRequest',
    ]);

    //custom csv Export
    Route::post('custom-csv-settings',[
        'uses' => '\App\Http\Controllers\User\UserController@customCsvSettings',
        'as'   => 'custom.csv.settings',
    ]);

    // start custom export in User Dashboard
    Route::get('/settings/exports/exports',[
        'uses' => '\App\Http\Controllers\User\UserController@exports',
        'as'   => 'exports',
    ]);
    Route::get('/settings/exports/csv-export-settings',[
        'uses' => '\App\Http\Controllers\User\UserController@csvExportSettings',
        'as'   => 'csv-export-settings',
    ]);
    /*Route::get('/', [\App\Http\Controllers\User\UserController::class, 'downloadFile']);*/
    Route::get('reDownloadFile/{file_name}', [
        'uses' => '\App\Http\Controllers\User\UserController@reDownloadFile',
        'as' => 'reDownloadFile'
    ]);
    // end custom export in User Dashboard



    // start Update User Info
    Route::post('/settings/updateUserFirstName/{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@updateUserFirstName',
        'as'   => 'updateUserFirstName',
    ]);
    Route::post('/settings/updateUserLastName/{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@updateUserLastName',
        'as'   => 'updateUserLastName',
    ]);
    Route::post('/settings/updateUserTitle',[
        'uses' => '\App\Http\Controllers\User\UserController@updateUserTitle',
        'as'   => 'updateUserTitle',
    ]);
    Route::post('/settings/updateUserPhone/{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@updateUserPhone',
        'as'   => 'updateUserPhone',
    ]);
    Route::post('/settings/updateUserAddress',[
        'uses' => '\App\Http\Controllers\User\UserController@updateUserAddress',
        'as'   => 'updateUserAddress',
    ]);
    Route::get('/settings/updateUserCountry/{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@updateUserCountry',
        'as'   => 'updateUserCountry',
    ]);
    Route::post('/settings/updateUserEmail/{id}',[
        'uses' => '\App\Http\Controllers\User\UserController@updateUserEmail',
        'as'   => 'updateUserEmail',
    ]);

    Route::get('/settings/updateUserInfo/{array}',[
        'uses' => '\App\Http\Controllers\User\UserController@updateUserInfo',
        'as'   => 'updateUserInfo',
    ]);
    // end Update User Info


    Route::get('/settings/credits/current',[
        'uses' => '\App\Http\Controllers\User\UserController@current',
        'as'   => 'current',
    ]);
    Route::get('/settings/credits/history',[
        'uses' => '\App\Http\Controllers\User\UserController@history',
        'as'   => 'history',
    ]);
    Route::post('/daterange/fetch_data', '\App\Http\Controllers\User\UserController@historyDate')->name('historyDate');

    Route::get('/settings/upgrade',[
        'uses' => '\App\Http\Controllers\User\UserController@upgradeUser',
        'as'   => 'upgrade',
    ]);
    Route::get('/settings/upgrade/paypal',[
        'uses' => '\App\Http\Controllers\User\UserController@upgradeUserPayment',
        'as'   => 'upgradePayment',
    ]);
    Route::get('/settings/upgrade/bitcoincash',[
        'uses' => '\App\Http\Controllers\User\UserController@upgradeUserNewPayment',
        'as'   => 'upgradeNewPayment',
    ]);
    //Route::get('stripe', [StripeController::class, 'stripe']);
    Route::post('stripe',[
        'uses' => '\App\Http\Controllers\User\Payment\StripeController@stripeAccess',
        'as'   => 'stripe',
    ]);



    Route::match(['get', 'post'], '/payments/crypto/pay', Victorybiz\LaravelCryptoPaymentGateway\Http\Controllers\CryptoPaymentController::class)
        ->name('payments.crypto.pay');







    //add Card Info
    Route::post('addCardInfo',[
        'uses' => '\App\Http\Controllers\User\UserController@addCardInfo',
        'as'   => 'addCardInfo',
    ]);
    Route::post('updateCardInfo',[
        'uses' => '\App\Http\Controllers\User\UserController@updateCardInfo',
        'as'   => 'updateCardInfo',
    ]);
    Route::get('removeCard',[
        'uses' => '\App\Http\Controllers\User\UserController@removeCard',
        'as'   => 'removeCard',
    ]);

    // route for processing payment
    Route::post('/paypal', [PayPalPaymentController::class, 'payWithpaypal'])->name('paypal');

    // route for check status of the payment
    Route::get('/status', [PayPalPaymentController::class, 'getPaymentStatus'])->name('status');

});
Route::post('/settings/updateUserPassword/{id}',[
    'uses' => '\App\Http\Controllers\User\UserController@updateUserPassword',
    'as'   => 'updateUserPassword',
]);

Route::get('userLogout',[
    'uses' => '\App\Http\Controllers\User\UserController@logout',
    'as'   => 'userLogout',
]);



Route::post('/payments/crypto/callback', [App\Http\Controllers\Admin\Payment\PaymentController::class, 'callback'])
    ->withoutMiddleware(['web', 'auth']);


//Admin Dashboard

Route::prefix('admin')->group(function() {
    Route::get('/login','\App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', '\App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', '\App\Http\Controllers\Auth\AdminLoginController@logout')->name('admin.logout');


    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', '\App\Http\Controllers\Auth\AdminController@index')->name('admin.dashboard');

        //view all
        Route::get('/view-all', '\App\Http\Controllers\AdminController@manageData')->name('view.all');
        Route::post('/edit-phoneList-data', '\App\Http\Controllers\AdminController@editPhoneListData')->name('edit.phoneList.data');
        Route::post('/people-search-by-admin', '\App\Http\Controllers\AdminController@peopleSearch')->name('people.search.by.admin');


        //user details
        Route::get('/view-all-user', '\App\Http\Controllers\AdminController@manageUser')->name('view.all.user');
        Route::get('/delete-user-data/{id}', '\App\Http\Controllers\AdminController@deleteUserData')->name('delete.user.data');


        //add new user
        Route::get('/add-new-user', '\App\Http\Controllers\AdminController@addNewUser')->name('add.new.user');
        Route::post('/add-new-user-by-admin', '\App\Http\Controllers\AdminController@addNewUserByAdmin')->name('add.new.user.by.admin');
        Route::get('/credit-transfer', '\App\Http\Controllers\AdminController@creditTransfer')->name('transfer.user.credit');
        Route::post('/reset/user/password', '\App\Http\Controllers\AdminController@resetUserPassword')->name('reset.user.password');


        //update user credit/plan
        Route::post('/update-user-credit', '\App\Http\Controllers\AdminController@updateUserCredit')->name('update.user.credit');
        Route::get('/update-user-plan/{planId}/{id}', '\App\Http\Controllers\AdminController@updatePlan')->name('update.user.plan');
   });


}) ;


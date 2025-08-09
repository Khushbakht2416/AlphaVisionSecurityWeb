<?php

use App\Http\Controllers\backend\AdminLoginPortalController;
use App\Http\Controllers\backend\AdminLoginPortalCustomerController;
use App\Http\Controllers\backend\AdminLoginPortalCustomerMailController;
use App\Http\Controllers\backend\AdminLoginPortalCustomerNotificationsController;
use App\Http\Controllers\backend\AdminLoginPortalCustomerSitesController;
use App\Http\Controllers\backend\AdminLoginPortalSitesReportsController;
use App\Http\Controllers\frontend\AboutUsController;
use App\Http\Controllers\frontend\ContactUsController;
use App\Http\Controllers\frontend\QuoteController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\PricingController;
use App\Http\Controllers\frontend\ServicesController;
use App\Http\Controllers\loginportal\LoginPortalHomeController;
use App\Http\Controllers\loginportal\LoginPortalLoginController;
use App\Http\Controllers\loginportal\LoginPortalUserNotificationsController;
use App\Http\Controllers\loginportal\LoginPortalUserProfileController;
use App\Http\Controllers\loginportal\LoginPortalUserReportsController;
use App\Http\Controllers\loginportal\LoginPortalUserSettingController;
use App\Http\Controllers\loginportal\LoginPortalUserSitesController;
use App\Http\Controllers\TwilioController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

// About Route
Route::get('/about-us', [AboutUsController::class, 'index'])->name('frontend.about');

// Pricing Route
Route::get('/pricing', [PricingController::class, 'index'])->name('frontend.pricing');

// Contact Route
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('frontend.contact');
Route::post('/contact-us', [ContactUsController::class, 'submitMessage']);

// Services Route
Route::get('/services', [ServicesController::class, 'index'])->name('frontend.services');
Route::get('/live-cctv-monitoring', [ServicesController::class, 'liveCCTVMonitoring'])->name('frontend.live-cctv-monitoring');
Route::get('/live-alarm-monitoring', [ServicesController::class, 'liveAlarmMonitoring'])->name('frontend.live-alarm-monitoring');
Route::get('/installation', [ServicesController::class, 'installation'])->name('frontend.installation');

// Quote Route
Route::get('/quote', [QuoteController::class, 'index'])->name('frontend.quote');
Route::post('/quote', [QuoteController::class, 'submitMessage']);


// ------------------------------ Admin Side ----------------------------------- //
use App\Http\Controllers\backend\AdminContactController;
use App\Http\Controllers\backend\AdminHomeController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\AdminLoginController;
use App\Http\Controllers\backend\AdminQuoteController;

// AdminDashboard Routes
Route::get('/admin', [AdminHomeController::class, 'index'])->name('adminHome');

// AdminLogin Routes
Route::post('/admin/login', [AdminLoginController::class, 'onlogin']);
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('adminLogin');

// AdminContact Routes
Route::get('/admin/contact', [AdminContactController::class, 'index'])->name('adminContact');
Route::get('/admin/contact/{id}', [AdminContactController::class, 'destroy']);

// AdminQuote Routes
Route::get('/admin/quote', [AdminQuoteController::class, 'index']);
Route::get('/admin/quote/{id}', [AdminQuoteController::class, 'destroy']);


// AdminProfile Routes
Route::get('/admin/profile', [AdminProfileController::class, 'index']);
Route::post('/admin/change-credentials/{id}', [AdminLoginController::class, 'changeCredentials'])->name('admin.change-credentials');
Route::post('/admin/update/{id}', [AdminProfileController::class, 'updateAdminProfile']);


// AdminLogout Route
Route::get('/admin/logout', function () {
    if (session()->has('email')) {
        session()->pull('email');
        session()->pull('username');
        session()->pull('id');
        session()->flush();
    }
    return redirect('/admin/login');
});


// ------------------------------ LoginPortal User Side ----------------------------------- //

// Home Routes
Route::get('/customerportal', [LoginPortalHomeController::class, 'index'])->name('loginHomeController');

// Login Routes
Route::get('/customerportal/login', [LoginPortalLoginController::class, 'index'])->name('loginPortalLogin');
Route::post('/customerportal/onlogin', [LoginPortalLoginController::class, 'onLogin'])->name('onloginPortalLogin');

// Logout Route
Route::get('/customerportal/logout', [LoginPortalLoginController::class, 'logout'])->name('customerportalLogout');

// Forgot Password Routes
Route::get('/customerportal/forgotpassword', [LoginPortalLoginController::class, 'forgotPasswordView'])->name('forgotPassword');
Route::post('/customerportal/sendforgotPasswordMail', [LoginPortalLoginController::class, 'forgotPasswardMail'])->name('sendForgotPasswordMail');
Route::get('/customerportal/passwordReset/{token}', [LoginPortalLoginController::class, 'resetPasswordVerifiyToken'])->name('passowardVerify');
Route::post('/customerportal/resetpassword', [LoginPortalLoginController::class, 'setForgotPassword'])->name('setNewPassword');

// Customer Profile Routes
Route::get('/customerportal/profile', [LoginPortalUserProfileController::class, 'index'])->name('customerportal.profileView');
Route::post('/customerportal/profile/update', [LoginPortalUserProfileController::class, 'updateProfileImage'])->name('customer.update-profile-image');


// Customer Setting Routes
Route::get('/customerportal/settings', [LoginPortalUserSettingController::class, 'index'])->name('customerportal.settingView');
Route::post('/customerportal/updateProfileSettings', [LoginPortalUserSettingController::class, 'updateSetting'])->name('customerportal.setting');
Route::post('/customerportal/updateProfilePassword', [LoginPortalUserSettingController::class, 'updatePassword'])->name('customerportal.password');

// Customer Sites Routes
Route::get('/customerportal/sites', [LoginPortalUserSitesController::class, 'index'])->name('customer.sites');
Route::get('/customerportal/site/{token}', [LoginPortalUserSitesController::class, 'singleSite'])->name('customer.singleSite');

// Customer Reports Routes
Route::get('/customerportal/reports', [LoginPortalUserReportsController::class, 'index'])->name('customer.reports');
Route::get('/customerportal/report/{token}', [LoginPortalUserReportsController::class, 'singleReport'])->name('customer.reportView');

// Customer Notifications Routes
Route::get('/customerportal/notifications', [LoginPortalUserNotificationsController::class, 'index'])->name('customer.notifications');


// ------------------------------ LoginPortal Admin Side ----------------------------------- //

// LoginPortal Dashboard
Route::get('/loginportaldashbaord', [AdminLoginPortalController::class, 'index'])->name('AdminLognPortal');

// LoginPortal Customer
Route::get('/loginportal/customers', [AdminLoginPortalCustomerController::class, 'index'])->name('CustomerLoginPortal');
Route::get('/loginportal/create-customer', [AdminLoginPortalCustomerController::class, 'createCustomerView'])->name('newCustomerView');
Route::post('/loginportal/create-new-customer', [AdminLoginPortalCustomerController::class, 'createCustomer'])->name('newCustomerStore');
Route::get('/loginportal/toggle-customer-status/{id}', [AdminLoginPortalCustomerController::class, 'toggleCustomerStatus']);
Route::get('/loginportal/delete-customer/{id}', [AdminLoginPortalCustomerController::class, 'destroy'])->name('customer.delete');

// Login Portal Customer Mails
Route::post('/loginportal/send-credentials', [AdminLoginPortalCustomerMailController::class, 'sendCredentials']);

Route::get('/loginportal/send-credential-email/{id}', [AdminLoginPortalCustomerMailController::class, 'sendCredentialEmail']);
Route::get('/loginportal/send-custom-email/{id}', [AdminLoginPortalCustomerMailController::class, 'sendCustomEmailView']);
Route::get('/loginportal/send-custom-sms/{id}', [AdminLoginPortalCustomerMailController::class, 'sendCustomSmsView']);
Route::post('/loginportal/send-custom-email', [AdminLoginPortalCustomerMailController::class, 'sendCustomEmail']);
Route::get('/loginportal/send-blocked-status-sms/{id}', [AdminLoginPortalCustomerMailController::class, 'sendBlockedStatusSMS']);
Route::get('/loginportal/send-blocked-status-email/{id}', [AdminLoginPortalCustomerMailController::class, 'sendBlockedStatusEmail']);

// Customer Sites Routes
Route::get('/loginportal/view-sites/{id}', [AdminLoginPortalCustomerSitesController::class , 'viewSite']);
Route::get('/loginportal/view-site/{id}', [AdminLoginPortalCustomerSitesController::class , 'viewSingleSite']);
Route::get('/loginportal/add-site/{id}', [AdminLoginPortalCustomerSitesController::class , 'addSiteView']);
Route::post('/loginportal/create-site/{id}', [AdminLoginPortalCustomerSitesController::class , 'addSite']);
Route::get('/loginportal/delete-site/{id}', [AdminLoginPortalCustomerSitesController::class, 'deleteSite']);
Route::get('/loginportal/edit-site/{id}', [AdminLoginPortalCustomerSitesController::class, 'edit']);
Route::post('/loginportal/edit-site/{id}', [AdminLoginPortalCustomerSitesController::class, 'update']);
Route::get('/loginportal/view-all-sites', [AdminLoginPortalCustomerSitesController::class, 'viewAllSite']);
Route::get('/loginportal/create-new-site', [AdminLoginPortalCustomerSitesController::class, 'createNewSiteView']);
Route::post('/loginportal/create-new-site', [AdminLoginPortalCustomerSitesController::class, 'createNewSite']);

// Customer Sites Reports Routes
Route::get('/loginportal/view-all-reports', [AdminLoginPortalSitesReportsController::class, 'index']);
Route::get('/loginportal/create-new-report', [AdminLoginPortalSitesReportsController::class, 'createNewReportView']);
Route::post('/loginportal/create-new-report', [AdminLoginPortalSitesReportsController::class, 'createNewReport']);
Route::get('/loginportal/delete-report/{id}', [AdminLoginPortalSitesReportsController::class, 'deleteNewReport']);
Route::get('/loginportal/view-reports/{id}', [AdminLoginPortalSitesReportsController::class, 'viewReportView']);
Route::get('/loginportal/create-new-report/{id}', [AdminLoginPortalSitesReportsController::class, 'createReportView']);
Route::post('/loginportal/create-site-report/{id}', [AdminLoginPortalSitesReportsController::class, 'storeSiteReport']);
Route::get('/loginportal/edit-report/{id}', [AdminLoginPortalSitesReportsController::class, 'editReportView']);
Route::put('/loginportal/update-site-report/{id}', [AdminLoginPortalSitesReportsController::class, 'updateSiteReport']);

// Customer Notifications Routes
Route::get('/loginportal/view-all-notifications', [AdminLoginPortalCustomerNotificationsController::class, 'index']);
Route::get('/loginportal/view-notifications', [AdminLoginPortalCustomerNotificationsController::class, 'index']);
Route::get('/loginportal/send-new-notification', [AdminLoginPortalCustomerNotificationsController::class, 'sendNewNotificationView']);
Route::post('/loginportal/send-new-notification', [AdminLoginPortalCustomerNotificationsController::class, 'sendNewNotification']);
Route::get('/loginportal/edit-notification/{id}', [AdminLoginPortalCustomerNotificationsController::class, 'editNotification']);
Route::post('/loginportal/update-notification/{id}', [AdminLoginPortalCustomerNotificationsController::class, 'updateNotification']);
Route::get('/loginportal/delete-notification/{id}', [AdminLoginPortalCustomerNotificationsController::class, 'deleteNotification']);
Route::get('/loginportal/view-notifications/{id}', [AdminLoginPortalCustomerNotificationsController::class, 'viewNotification']);
Route::get('/loginportal/send-notification/{id}', [AdminLoginPortalCustomerNotificationsController::class, 'sendNotificationView']);
Route::post('/loginportal/send-notification/{id}', [AdminLoginPortalCustomerNotificationsController::class, 'sendNotification']);

// Twilio SMS Routes
Route::post('/loginportal/send-custom-sms', [TwilioController::class, 'sendSms'])->name('sms.send');






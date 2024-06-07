<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::post('logout', 'App\Http\Controllers\UserController@logout')->name('logout');

Route::get('login', 'App\Http\Controllers\HomeController@login')->name('user.login');
Route::post('user/logged-in', 'App\Http\Controllers\HomeController@loggedIn')->name('user.logged.in');
Route::get('register', 'App\Http\Controllers\HomeController@register')->name('user.register');
Route::post('user/create', 'App\Http\Controllers\HomeController@createUser')->name('user.createUser');
Route::get('plans/create-payment', 'App\Http\Controllers\HomeController@createPayment')->name('createPayment');
// Route::resource('meetings', 'ZoomCallController');

/* Event website route */

Route::middleware(['auth'])->group(function () {
    Route::post('plans/subscription', 'App\Http\Controllers\HomeController@createSubscription')->name('plans.subscription');
});

/* Route for user dashboard */

Route::group(['prefix' => 'user', 'middleware' => ['userAccess']], function () {
    Route::any('profile', 'App\Http\Controllers\UserDashboardController@profile')->name('user.profile');
    Route::post('profile/edit', 'App\Http\Controllers\UserDashboardController@edit_profile')->name('user.profile.edit');
    Route::any('logout', 'App\Http\Controllers\UserDashboardController@logout')->name('user.logout');
});



/* Home Page */
Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home');

//Route::post('remove', 'App\Http\Controllers\HomeController@removeCart')->name('cart.remove');
//Route::post('clear', 'App\Http\Controllers\HomeController@clearAllCart')->name('cart.clear');

/* CMS pages */
Route::get('about-us', 'App\Http\Controllers\HomeController@aboutUs')->name('aboutUs');
Route::get('privacy-policy', 'App\Http\Controllers\HomeController@privacyPolicy')->name('privacyPolicy');
Route::get('contact-us', 'App\Http\Controllers\HomeController@contactUs')->name('contactUs');
Route::get('resources', 'App\Http\Controllers\HomeController@resources')->name('resources');
Route::get('all-job', 'App\Http\Controllers\HomeController@getAllJob')->name('all.job');
Route::get('job-skill/{id}', 'App\Http\Controllers\HomeController@getJobSkillbyId')->name('frontend.job.skill');
Route::get('faq', 'App\Http\Controllers\HomeController@faq')->name('faq');
Route::get('terms-and-conditions', 'App\Http\Controllers\HomeController@termsConditions')->name('termsConditions');


/* Route for admin portal */
Route::group(['prefix' => 'admin', 'middleware' => ['adminAccess']], function () {
    Route::get('dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('dashboard');
    Route::any('logout', 'App\Http\Controllers\admin\DashboardController@logout')->name('admin.logout');



    /* Route for candidates section */
    Route::group(['prefix' => 'candidates'], function () {
        Route::get('/', 'App\Http\Controllers\admin\CandidatesController@index')->name('candidates.index');
        Route::post('store', 'App\Http\Controllers\admin\CandidatesController@store')->name('candidates.store');
        Route::post('delete', 'App\Http\Controllers\admin\CandidatesController@delete')->name('candidates.delete');
        Route::get('edit', 'App\Http\Controllers\admin\CandidatesController@edit')->name('candidates.edit');
        Route::post('update', 'App\Http\Controllers\admin\CandidatesController@update')->name('candidates.update');
    });
});

/* Route for School Management section */
Route::get('admin/login', 'App\Http\Controllers\superAdmin\DashboardController@superAdminLogin')->name('superAdminLogin');
Route::post('admin/logged-in', 'App\Http\Controllers\superAdmin\DashboardController@login')->name('superadmin.login');
Route::get('{pagename}/login', [UserController::class, 'login'])->name('fundraisingLogin');
Route::group(['prefix' => 'admin', 'middleware' => ['superAdminAccess']], function () {
    Route::get('dashboard', 'App\Http\Controllers\superAdmin\DashboardController@index')->name('superadmin.dashboard');
    Route::any('logout', 'App\Http\Controllers\superAdmin\DashboardController@logout')->name('superadmin.logout');

    /* Route for interviewer section */
    Route::group(['prefix' => 'interviewers'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\InterviewerController@index')->name('superadmin.interviewers.index');
        Route::post('store', 'App\Http\Controllers\superAdmin\InterviewerController@store')->name('superadmin.interviewers.store');
        Route::get('show/{id}', 'App\Http\Controllers\superAdmin\InterviewerController@show')->name('superadmin.interviewers.show');
        Route::get('edit/{id}', 'App\Http\Controllers\superAdmin\InterviewerController@edit')->name('superadmin.interviewers.edit');
        Route::post('update', 'App\Http\Controllers\superAdmin\InterviewerController@update')->name('superadmin.interviewers.update');
        Route::post('/delete-interviewer', 'App\Http\Controllers\superAdmin\InterviewerController@deleteInterviewer')->name('superadmin.interviewers.deleteInterviewer');
    });

    /* Route for candidates section */
    Route::group(['prefix' => 'candidate'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\CandidatesController@index')->name('superadmin.candidate.index');
        Route::post('store', 'App\Http\Controllers\superAdmin\CandidatesController@store')->name('superadmin.candidate.store');
        Route::post('delete', 'App\Http\Controllers\superAdmin\CandidatesController@delete')->name('superadmin.candidate.delete');
        Route::get('edit', 'App\Http\Controllers\superAdmin\CandidatesController@edit')->name('superadmin.candidate.edit');
        Route::get('view', 'App\Http\Controllers\superAdmin\CandidatesController@view')->name('superadmin.candidate.view');
        Route::post('update', 'App\Http\Controllers\superAdmin\CandidatesController@update')->name('superadmin.candidate.update');
        Route::post('status-change', 'App\Http\Controllers\superAdmin\CandidatesController@statusChange')->name('superadmin.candidate.statusChange');
        Route::post('/delete-kid', 'App\Http\Controllers\superAdmin\CandidatesController@deleteKid')->name('superadmin.candidate.deletekid');
    });

    /* Route for skill section */
    Route::group(['prefix' => 'skills'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\SkillController@index')->name('superadmin.skills.index');
        Route::post('store', 'App\Http\Controllers\superAdmin\SkillController@store')->name('superadmin.skills.store');
        Route::get('edit/{id}', 'App\Http\Controllers\superAdmin\SkillController@edit')->name('superadmin.skills.edit');
        Route::post('update', 'App\Http\Controllers\superAdmin\SkillController@update')->name('superadmin.skills.update');
        Route::post('/delete-skill', 'App\Http\Controllers\superAdmin\SkillController@deleteSkill')->name('superadmin.skills.delete');
    });

    /* Route for plans section */
    Route::group(['prefix' => 'plans'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\PlanController@index')->name('superadmin.plans.index');
        Route::post('store', 'App\Http\Controllers\superAdmin\PlanController@store')->name('superadmin.plans.store');
        Route::get('edit/{id}', 'App\Http\Controllers\superAdmin\PlanController@edit')->name('superadmin.plans.edit');
        Route::post('update', 'App\Http\Controllers\superAdmin\PlanController@update')->name('superadmin.plans.update');
        Route::post('/delete-plan', 'App\Http\Controllers\superAdmin\PlanController@deletePlan')->name('superadmin.plans.delete');
    });

    /* Route for tasks section */
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\TaskController@index')->name('superadmin.tasks.index');
        Route::post('store', 'App\Http\Controllers\superAdmin\TaskController@store')->name('superadmin.tasks.store');
        Route::get('show/{id}', 'App\Http\Controllers\superAdmin\TaskController@show')->name('superadmin.tasks.show');
        Route::get('edit/{id}', 'App\Http\Controllers\superAdmin\TaskController@edit')->name('superadmin.tasks.edit');
        Route::get('chart-data/{id}', 'App\Http\Controllers\superAdmin\TaskController@getChartData')->name('superadmin.tasks.getChartData');
        Route::post('update', 'App\Http\Controllers\superAdmin\TaskController@update')->name('superadmin.tasks.update');
        Route::post('/delete-task', 'App\Http\Controllers\superAdmin\TaskController@delete')->name('superadmin.tasks.delete');
    });
    /* Route for candidates Assessments section */
    Route::group(['prefix' => 'assessments'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\AssessmentController@index')->name('superadmin.assessments.index');
        Route::post('store', 'App\Http\Controllers\superAdmin\AssessmentController@store')->name('superadmin.assessments.store');
        Route::get('show/{id}', 'App\Http\Controllers\superAdmin\AssessmentController@show')->name('superadmin.assessments.show');
        Route::get('edit/{id}', 'App\Http\Controllers\superAdmin\AssessmentController@edit')->name('superadmin.assessments.edit');
        Route::post('update', 'App\Http\Controllers\superAdmin\AssessmentController@update')->name('superadmin.assessments.update');
        Route::get('generate-assessment-pdf/{kidId}', 'App\Http\Controllers\superAdmin\AssessmentController@generateAssessmentPDF')->name('superadmin.assessments.generateAssessmentPDF');
        Route::get('get-candidatesAssesmentsTrials', 'App\Http\Controllers\superAdmin\AssessmentController@getcandidatesAssesmentsTrials')->name('superadmin.assessments.candidatesAssesmentsTrials');
    });

    /* Route for Attendances section */
    Route::group(['prefix' => 'attendances'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\AttendancesController@index')->name('superadmin.attendances.index');
        Route::post('store', 'App\Http\Controllers\superAdmin\AttendancesController@store')->name('superadmin.attendances.store');
        Route::get('show/{id}', 'App\Http\Controllers\superAdmin\AttendancesController@show')->name('superadmin.attendances.show');
        Route::get('generate-attendences-pdf/{kidId}', 'App\Http\Controllers\superAdmin\AttendancesController@generateAttendencesPDF')->name('superadmin.attendances.generateAttendencesPDF');
        Route::get('edit/{id}', 'App\Http\Controllers\superAdmin\AttendancesController@edit')->name('superadmin.attendances.edit');
        Route::get('attendancesDateWise/{date}', 'App\Http\Controllers\superAdmin\AttendancesController@getAttendancesDateWise')->name('superadmin.attendances.dateWise');
        Route::post('update', 'App\Http\Controllers\superAdmin\AttendancesController@update')->name('superadmin.attendances.update');
    });

    /* Route for Settings section */
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\SettingsController@index')->name('superadmin.settings.profile');
        Route::post('/profile-image-update', 'App\Http\Controllers\superAdmin\SettingsController@profileImageUpdate')->name('superadmin.settings.profileImageUpdate');
        Route::post('/reset-password', 'App\Http\Controllers\superAdmin\SettingsController@resetPassword')->name('superadmin.settings.resetPasword');
        Route::post('/update-profile', 'App\Http\Controllers\superAdmin\SettingsController@updateProfile')->name('superadmin.settings.updateProfile');
    });

    /* Route for Fundraising section */
    Route::group(['prefix' => 'fundraising'], function () {


        Route::get('/sold-out-tickets/{id?}', 'App\Http\Controllers\superAdmin\FundraisingController@getSoldOutTickets')->name('superadmin.fundraising.soldOutTickets');
        Route::get('/sold-out-sponsorship/{id?}', 'App\Http\Controllers\superAdmin\FundraisingController@getSoldOutSponsorships')->name('superadmin.fundraising.soldOutSponsorship');
        Route::get('/sold-out-casinogames/{id?}', 'App\Http\Controllers\superAdmin\FundraisingController@getSoldOutCasinogames')->name('superadmin.fundraising.soldOutCasinogame');
        Route::get('/total-donations/{id}', 'App\Http\Controllers\superAdmin\FundraisingController@getTotalDonations')->name('superadmin.fundraising.totalDonations');
        Route::get('/ticket-scanner/{id?}', 'App\Http\Controllers\superAdmin\FundraisingController@ticketScanner')->name('superadmin.fundraising.ticketScanner');
        Route::get('/get-sold-ticket-detail/{code}/{type}', 'App\Http\Controllers\superAdmin\FundraisingController@getSoldTicketDetail')->name('superadmin.fundraising.getSoldTicketDetail');
        Route::post('/verified-ticket-status', 'App\Http\Controllers\superAdmin\FundraisingController@changeVerifiedTicketStatus')->name('superadmin.fundraising.changeVerifiedTicketStatus');
        Route::get('/download-ticket-pdf/{id}', 'App\Http\Controllers\superAdmin\FundraisingController@downloadTicketPdf')->name('downloadTicketPdf');
        Route::get('/export-sold-tickets/{id?}', 'App\Http\Controllers\superAdmin\FundraisingController@exportSoldTickets')->name('exportSoldTickets');
        Route::get('/website-donations', 'App\Http\Controllers\superAdmin\FundraisingController@getWebsiteDonation')->name('superadmin.fundraising.websiteDonation');
        Route::get('/download-invoice-pdf/{id}', 'App\Http\Controllers\superAdmin\FundraisingController@downloadinvoicePdf')->name('downloadinvoicePdf');

        Route::post('/donation-payment', 'App\Http\Controllers\superAdmin\FundraisingController@abc')->name('donationPayment');


        /* Event Route */
        Route::get('/past-event', 'App\Http\Controllers\superAdmin\EventController@getPastEventList')->name('superadmin.fundraising.pastEvent');
        Route::get('/create-event', 'App\Http\Controllers\superAdmin\EventController@createEvent')->name('superadmin.fundraising.createEvent');
        Route::get('/edit-event/{id}', 'App\Http\Controllers\superAdmin\EventController@editEvent')->name('superadmin.fundraising.editEvent');
        Route::post('/update-event', 'App\Http\Controllers\superAdmin\EventController@updateEvent')->name('superadmin.fundraising.updateEvent');
        Route::post('/store-event', 'App\Http\Controllers\superAdmin\EventController@store')->name('superadmin.fundraising.store');
        Route::get('/live-event', 'App\Http\Controllers\superAdmin\EventController@liveEvent')->name('superadmin.fundraising.liveEvent');
        Route::post('change-event-status', 'App\Http\Controllers\superAdmin\EventController@changeEventStatus')->name('superadmin.fundraising.changeEventStatus');
        Route::get('/edit-event/{slug}', 'App\Http\Controllers\superAdmin\EventController@editEvent')->name('superadmin.fundraising.editEvent');
        Route::post('update-event', 'App\Http\Controllers\superAdmin\EventController@updateEvent')->name('superadmin.fundraising.updateEvent');
        Route::post('delete-event', 'App\Http\Controllers\superAdmin\EventController@deleteEvent')->name('superadmin.fundraising.deleteEvent');
        Route::get('/event-detail/{slug?}', 'App\Http\Controllers\superAdmin\FundraisingController@index')->name('superadmin.fundraising.index');
        /* ticket Route */

        Route::get('/tickets/{id?}', 'App\Http\Controllers\superAdmin\TicketController@getTicketsList')->name('superadmin.fundraising.tickets');
        Route::post('/create-ticket', 'App\Http\Controllers\superAdmin\TicketController@createTicket')->name('superadmin.fundraising.createTicket');
        Route::get('/show-ticket/{id}', 'App\Http\Controllers\superAdmin\TicketController@showTicket')->name('superadmin.fundraising.showTicket');
        Route::get('/edit-ticket/{id}', 'App\Http\Controllers\superAdmin\TicketController@editTicket')->name('superadmin.fundraising.editTicket');
        Route::post('/update-ticket', 'App\Http\Controllers\superAdmin\TicketController@updateTicket')->name('superadmin.fundraising.updateTicket');
        Route::post('/delete-ticket', 'App\Http\Controllers\superAdmin\TicketController@deleteTicket')->name('superadmin.fundraising.deleteTicket');
        Route::post('change-ticket-status', 'App\Http\Controllers\superAdmin\TicketController@changeTicketStatus')->name('superadmin.fundraising.changeTicketStatus');


        /* sponsorships Route */

        Route::get('/sponsorships/{id?}', 'App\Http\Controllers\superAdmin\SponsorshipController@getSponsorshipsList')->name('superadmin.fundraising.sponsorships');
        Route::post('/create-sponsorship', 'App\Http\Controllers\superAdmin\SponsorshipController@createSponsorship')->name('superadmin.fundraising.createSponsorship');
        Route::get('/show-sponsorship/{id}', 'App\Http\Controllers\superAdmin\SponsorshipController@showSponsorship')->name('superadmin.fundraising.showTSponsorship');
        Route::get('/edit-sponsorship/{id}', 'App\Http\Controllers\superAdmin\SponsorshipController@editSponsorship')->name('superadmin.fundraising.editSponsorship');
        Route::post('/update-sponsorship', 'App\Http\Controllers\superAdmin\SponsorshipController@updateSponsorship')->name('superadmin.fundraising.updateSponsorship');
        Route::post('/delete-sponsorship', 'App\Http\Controllers\superAdmin\SponsorshipController@deleteSponsorship')->name('superadmin.fundraising.deleteSponsorship');

        /* casino games Route */

        Route::get('/casinogames/{id?}', 'App\Http\Controllers\superAdmin\SponsorshipController@getCasinogamesList')->name('superadmin.fundraising.casinogames');
    });



    /* Route for jobs section */
    Route::group(['prefix' => 'jobs'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\JobsController@index')->name('superadmin.jobs.index');
        Route::post('store', 'App\Http\Controllers\superAdmin\JobsController@store')->name('superadmin.jobs.store');
        Route::post('job-skill-store', 'App\Http\Controllers\superAdmin\JobsController@jobSkillsStore')->name('superadmin.jobs.slill.store');
        Route::get('edit/{id}', 'App\Http\Controllers\superAdmin\JobsController@edit')->name('superadmin.jobs.edit');
        Route::post('update', 'App\Http\Controllers\superAdmin\JobsController@update')->name('superadmin.jobs.update');
        Route::post('/delete-job', 'App\Http\Controllers\superAdmin\JobsController@deleteJob')->name('superadmin.jobs.delete');
        Route::get('show/{id}', 'App\Http\Controllers\superAdmin\JobsController@show')->name('superadmin.jobs.show');
        Route::get('job-skill-show/{id}', 'App\Http\Controllers\superAdmin\JobsController@jobSkillsShow')->name('superadmin.jobs.skills.show');
        
    });
    /* Route for candidates section */
    Route::group(['prefix' => 'candidates'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\CandidateController@index')->name('superadmin.candidates.index');
        Route::get('show/{id}', 'App\Http\Controllers\superAdmin\CandidateController@show')->name('superadmin.candidates.show');
        Route::post('/delete-candidate', 'App\Http\Controllers\superAdmin\CandidateController@deleteCandidate')->name('superadmin.candidates.delete');
    });

    Route::group(['prefix' => 'meetings'], function () {
        Route::get('/', 'App\Http\Controllers\superAdmin\ZoomCallController@index')->name('superadmin.meetings.index');
        Route::get('show/{id}', 'App\Http\Controllers\superAdmin\ZoomCallController@index')->name('superadmin.meetings.show');
        Route::post('/store', 'App\Http\Controllers\superAdmin\ZoomCallController@store')->name('superadmin.meetings.store');
        Route::get('show/{id}', 'App\Http\Controllers\superAdmin\ZoomCallController@index')->name('superadmin.meetings.edit');
    });
});
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Config cache has been cleared';
});

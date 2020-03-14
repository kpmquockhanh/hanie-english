<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'LandingPageController@index')->name('landing_page');
Route::post('/store-phone', 'LandingPageController@storePhone')->name('landing.store.phone');
Route::post('/store-job', 'LandingPageController@storeJob')->name('landing.store.job');
Route::post('/create-advisory', 'LandingPageController@makeAdvisory')->name('landing.create.advisory');
//Route::get('/test', 'LandingPageController@test')->name('landing.test.job');

Route::prefix('admin')->group(function () {
    Route::namespace('AdminAuth')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
        Route::get('logout', 'LoginController@logout');
        Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register', 'RegisterController@register');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('config', 'ConfigController@index')->name('admin.config');
        Route::post('config/update', 'ConfigController@update')->name('admin.config.update');
        Route::resource('teachers', 'TeacherController');
        Route::resource('phones', 'PhoneController');
        Route::resource('questions', 'QuestionController');
        Route::resource('answers', 'AnswerController');
        Route::resource('users', 'UserController');
        Route::post('users/active', 'UserController@active')->name('users.active');
        Route::post('users/ban', 'UserController@ban')->name('users.ban');
        Route::post('users/make-courses', 'UserController@makeCourses')->name('users.make-course');
        Route::resource('courses', 'CourseController');
        Route::resource('categories', 'CategoryController');
        Route::resource('advisories', 'AdvisoryController');
        Route::resource('recruitment', 'RecruitmentController')->except([
            'create',
            'store',
            'show'
        ]);
        Route::resource('feedback', 'FeedbackController');
        Route::resource('education-programs', 'EducationProgramController');
        Route::resource('levels', 'LevelController');
        Route::resource('user-course', 'UserCourseController');
        Route::resource('lessons', 'LessonController');
        Route::resource('examinations', 'ExaminationController');
        Route::resource('scores', 'ScoreController');
        Route::resource('histories', 'HistoryController');
        Route::resource('test-link', 'TestLinkController');
        Route::get('profile', 'AdminController@profile')->name('admin.profile');
        Route::put('profile', 'AdminController@update');

        Route::prefix('commands')->group(function () {
            Route::get('/', 'CommandController@index')->name('command.index');
            Route::post('clear-cache', 'CommandController@clearCache')->name('command.clearCache');
            Route::post('clear-route-cache', 'CommandController@clearRouteCache')->name('command.clearRouteCache');
//            Route::post('seed', 'CommandController@runSeed')->name('command.runSeed');
//            Route::post('migrate', 'CommandController@migrate')->name('command.migrate');
//            Route::post('fresh-migrate', 'CommandController@freshMigrate')->name('command.freshMigrate');
            Route::post('clear-optimize', 'CommandController@clearOptimize')->name('command.clearOptimize');
        });
    });
});
Route::prefix('user')->middleware('user.active')->group(function () {
    Route::namespace('UserAuth')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('user.login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('user.logout');
        Route::get('logout', 'LoginController@logout');
        Route::get('register', 'RegisterController@showRegistrationForm')->name('user.register');
        Route::post('register', 'RegisterController@register');
    });

    Route::middleware('auth:user')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard.index');
        Route::get('lessons/{course}', 'DashboardController@listLessons')->name('dashboard.lessons');
        Route::get('study/{lesson}', 'DashboardController@study')->name('dashboard.study');
        Route::get('study/{lesson}/examination', 'DashboardController@examination')->name('dashboard.examination');
        Route::post('study/{lesson}/examination', 'DashboardController@submitExamination')->name('dashboard.examination');
        Route::post('processLesson/', 'DashboardController@incrementCount')->name('dashboard.processLesson');
    });

});

Route::get('/home', 'HomeController@index')->name('home');

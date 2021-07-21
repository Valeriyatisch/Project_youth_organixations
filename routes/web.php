<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);

Route::get('/admin-site/news-form', [App\Http\Controllers\NewsController::class, 'show']);
Route::get('/admin-site/events-form', [App\Http\Controllers\EventsController::class, 'show']);
Route::get('/admin-site/organizations-form', [App\Http\Controllers\OrgsController::class, 'show']);
Route::get('/admin-site/users-form', [App\Http\Controllers\UsersController::class, 'show']);
Route::get('/admin-site/data-form', [App\Http\Controllers\DataController::class, 'show']);
Route::get('/admin-site/organizations-table', [App\Http\Controllers\OrgsController::class, 'showOrganizationTable']);
Route::get('/admin-site/news-table', [App\Http\Controllers\NewsController::class, 'showNewsTable']);
Route::get('/admin-site/news-change/{id}', [App\Http\Controllers\NewsController::class, 'newsChange'])->name('changeNew');
Route::get('/admin-site/events-table', [App\Http\Controllers\EventsController::class, 'showEventsTable']);
Route::get('/admin-site/users-table', [App\Http\Controllers\UsersController::class, 'showUsersTable']);

Route::get('/pmc-admin/news-form', [App\Http\Controllers\NewsController::class, 'pmcShow']);
Route::get('/pmc-admin/news-table', [App\Http\Controllers\NewsController::class, 'pmcShowNewsTable']);
Route::get('/pmc-admin/events-form', [App\Http\Controllers\EventsController::class, 'pmcShow']);
Route::get('/pmc-admin/events-table', [App\Http\Controllers\EventsController::class, 'pmcShowEventsTable']);
Route::get('/pmc-admin/about-form', [App\Http\Controllers\AboutController::class, 'pmcShow']);
Route::get('/pmc-admin/environment-form', [App\Http\Controllers\EnvController::class, 'pmcShow']);
Route::get('/pmc-admin/doc-form', [App\Http\Controllers\DocumentController::class, 'pmcShow']);
Route::get('/pmc-admin/data-form', [App\Http\Controllers\DataController::class, 'pmcShow']);

Route::get('/pmk-admin/news-form', [App\Http\Controllers\NewsController::class, 'pmkShow']);
Route::get('/pmk-admin/news-table', [App\Http\Controllers\NewsController::class, 'pmkShowNewsTable']);
Route::get('/pmk-admin/events-form', [App\Http\Controllers\EventsController::class, 'pmkShow']);
Route::get('/pmk-admin/events-table', [App\Http\Controllers\EventsController::class, 'pmkShowEventsTable']);
Route::get('/pmk-admin/data-form', [App\Http\Controllers\DataController::class, 'pmkShow']);
Route::get('/pmk-admin/subgroup-form', [App\Http\Controllers\SubgroupController::class, 'pmkShow']);
Route::get('/pmk-admin/about-form', [App\Http\Controllers\AboutController::class, 'pmkShow']);
Route::get('/pmk-admin/doc-form', [App\Http\Controllers\DocumentController::class, 'pmkShow']);
Route::get('/pmk-admin/team-form', [App\Http\Controllers\TeamController::class, 'pmkShow']);
Route::get('/pmk-admin/schedule-form', [App\Http\Controllers\ScheduleController::class, 'pmkShow']);

//Route::get('/admin-site', function () {
//    return view('admin-site');
//});

Route::get('/news', [App\Http\Controllers\NewsController::class, 'showNews']);
Route::get('/news/{id}', [App\Http\Controllers\NewsController::class, 'showOneNews'])->name('one-news');

Route::get('/events', [App\Http\Controllers\EventsController::class, 'showEvents']);
Route::get('/events/{id}', [App\Http\Controllers\EventsController::class, 'showOneEvent'])->name('one-event');

Route::get('/youth-organization', [App\Http\Controllers\OrgsController::class, 'showOrganization']);
Route::get('/youth-organization/{id}', [App\Http\Controllers\OrgsController::class, 'showOneOrganization'])->name('one-org');
Route::get('/youth-organization/{id}/about', [App\Http\Controllers\OrgsController::class, 'showAbout'])->name('about');
Route::get('/youth-organization/{id}/org-news', [App\Http\Controllers\NewsController::class, 'showOrgNews'])->name('org-news');
Route::get('/youth-organization/{id}/documents', [App\Http\Controllers\DocumentController::class, 'showOrgDocuments'])->name('org-doc');
Route::get('/youth-organization/{id}/clubs', [App\Http\Controllers\OrgsController::class, 'showClubs'])->name('clubs');
Route::get('/youth-organization/{id}/subgroups', [App\Http\Controllers\SubgroupController::class, 'showGroups'])->name('subgroups');
Route::get('/youth-organization/{id}/team', [App\Http\Controllers\TeamController::class, 'showTeam'])->name('team');
Route::get('/youth-organization/{id}/acc-environment', [App\Http\Controllers\EnvController::class, 'showEnvironment'])->name('acc-env');
Route::get('/youth-organization/{id}/schedule', [App\Http\Controllers\ScheduleController::class, 'showSchedule'])->name('schedule');

Route::get('/map', [App\Http\Controllers\OrgsController::class, 'showMap']);
Route::get('/youth-organization/{id}/contacts', [App\Http\Controllers\DataController::class, 'showContacts'])->name('contact');;

Auth::routes();

Route::get('/admin-site', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/pmc-admin', [App\Http\Controllers\PmcController::class, 'index'])->name('pmc-admin')->middleware('pmcadmin');
Route::get('/pmk-admin', [App\Http\Controllers\PmkController::class, 'index'])->name('pmk-admin')->middleware('pmkadmin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('client');


Route::post('/news-form', [App\Http\Controllers\NewsController::class, 'submit']);
Route::post('/news-change/{id}', [App\Http\Controllers\NewsController::class, 'change'])->name('change');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'dataChange'])->name('user-change');
Route::post('/events-form', [App\Http\Controllers\EventsController::class, 'submit']);
Route::post('/admin-site/organizations-form', [App\Http\Controllers\OrgsController::class, 'submit']);
Route::post('/admin-site/users-form', [App\Http\Controllers\UsersController::class, 'submit']);
Route::post('/data-form', [App\Http\Controllers\DataController::class, 'update']);
Route::post('/doc-form', [App\Http\Controllers\DocumentController::class, 'submit']);
Route::post('/acc-env', [App\Http\Controllers\EnvController::class, 'submit']);
Route::post('/subgroup-form', [App\Http\Controllers\SubgroupController::class, 'submit']);
Route::post('/team-form', [App\Http\Controllers\TeamController::class, 'submit']);
Route::post('/schedule-form', [App\Http\Controllers\ScheduleController::class, 'submit']);
Route::post('/sort-organization', [App\Http\Controllers\OrgsController::class, 'sortOrganization']);

Route::post('/about-form', [App\Http\Controllers\AboutController::class, 'updateAbout'])->name('about-update');



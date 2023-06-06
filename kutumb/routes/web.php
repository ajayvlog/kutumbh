<?php

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

Route::get('/', 'UsersController@search');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('password/change', 'Auth\ChangePasswordController@show')->name('password.change');
    Route::post('password/change', 'Auth\ChangePasswordController@update')->name('password.change');
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('profile', 'HomeController@index')->name('profile');
Route::post('family-actions/{user}/set-father', 'FamilyActionsController@setFather')->name('family-actions.set-father');
Route::post('family-actions/{user}/set-mother', 'FamilyActionsController@setMother')->name('family-actions.set-mother');
Route::post('family-actions/{user}/add-child', 'FamilyActionsController@addChild')->name('family-actions.add-child');
Route::post('family-actions/{user}/add-wife', 'FamilyActionsController@addWife')->name('family-actions.add-wife');
Route::post('family-actions/{user}/add-husband', 'FamilyActionsController@addHusband')->name('family-actions.add-husband');
Route::post('family-actions/{user}/set-parent', 'FamilyActionsController@setParent')->name('family-actions.set-parent');

Route::get('profile-search', 'UsersController@search')->name('users.search');
Route::get('users/{user}', 'UsersController@show')->name('users.show');
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('users/{user}', 'UsersController@update')->name('users.update');
Route::get('users/{user}/chart', 'UsersController@chart')->name('users.chart');
Route::get('users/{user}/tree', 'UsersController@tree')->name('users.tree');

Route::post('mediaposts/{user}/upload-media', 'MediaPostController@uploadMedia')->name('upload-media');

Route::post('notes/{user}/create-notes', 'NoteController@createNotes')->name('create-notes');

Route::get('users/{user}/pedigreetree', 'UsersController@pedigreetree')->name('users.pedigreetree');

Route::patch('users/{user}/photo-upload', 'UsersController@photoUpload')->name('users.photo-upload');
Route::delete('users/{user}', 'UsersController@destroy')->name('users.destroy');

Route::get('users/{user}/marriages', 'UserMarriagesController@index')->name('users.marriages');


/**
 * Dependent Dropdown
 */
Route::get('users/{user}/getCast/{id}','UsersController@getCast');
Route::get('users/{user}/getSubclan/{id}','UsersController@getSubclan');
Route::get('users/{user}/getState/{id}','UsersController@getState');
Route::get('users/{user}/getCity/{id}','UsersController@getCity');
Route::get('users/{user}/getTehsil/{id}','UsersController@getTehsil');
Route::get('users/{user}/getVillage/{id}','UsersController@getVillage');
//End Dependent Dropdown


Route::get('birthdays', 'BirthdayController@index')->name('birthdays.index');

/**
 * Couple/Marriages Routes
 */
Route::get('couples/{couple}', ['as' => 'couples.show', 'uses' => 'CouplesController@show']);
Route::get('couples/{couple}/edit', ['as' => 'couples.edit', 'uses' => 'CouplesController@edit']);
Route::patch('couples/{couple}', ['as' => 'couples.update', 'uses' => 'CouplesController@update']);

/**
 * Admin only routes
 */
Route::group(['middleware' => 'admin'], function () {
    /**
     * Backup Restore Database Routes
     */
    Route::post('backups/upload', ['as' => 'backups.upload', 'uses' => 'BackupsController@upload']);
    Route::post('backups/{fileName}/restore', ['as' => 'backups.restore', 'uses' => 'BackupsController@restore']);
    Route::get('backups/{fileName}/dl', ['as' => 'backups.download', 'uses' => 'BackupsController@download']);
    Route::resource('backups', 'BackupsController');
});


Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::group(['middleware' => 'auth_admin'], function() {
        Route::get('dashboard','HomeController@index')->name('home');
    
        Route::resource('religions','ReligionController');
        Route::resource('casts','CastController');
        Route::resource('dynasties','DynastyController');
        Route::resource('clans','ClanController');
        Route::resource('subclans','SubclanController');
        Route::resource('countries','CountryController');
        Route::resource('states','StateController');
        Route::resource('cities','CityController');

        Route::resource('tehsils','TehsilController');
        Route::get('tehsils/getCity/{id}','TehsilController@getCity');
        Route::get('tehsils/{edit}/getEditCity/{id}','TehsilController@getEditCity');

        Route::resource('villages','VillageController');
        Route::get('villages/getTehsil/{id}','VillageController@getTehsil');
        Route::get('villages/getCity/{id}','VillageController@getCity');
        Route::get('villages/{edit}/getEditCity/{id}','VillageController@getEditCity');
        Route::get('villages/{edit}/getEditTehsil/{id}','VillageController@getEditTehsil');

        
    });
    
    Route::namespace('Auth')->group(function(){
            
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');
        
        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
      
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
       
    });
});

Route::get("/desclaimer", function(){
    return view("desclaimer");
 });

Route::get("/privacypolicy", function(){
    return view("privacypolicy");
});

 Route::get("/termsConditions", function(){
    return view("termscondition");
});



Route::get('/link', function () {
    $link = Artisan::call('storage:link');
    echo "link created";

});
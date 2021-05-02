<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    
     // Events
     Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
     Route::resource('events', 'EventsController');
 
     Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

      // Category Page
     Route::get('/category/{id}/{slug}', 'HomeController@category')->name('category.page');
      
    
     // Single Post Page
       // Route::get('/post/{id}/{slug}', 'HomeController@post')->name('post.page');
     Route::resource('posts', 'PostsController');

       // Project
    //Route::delete('project/destroy', 'ProjectController@massDestroy')->name('project.massDestroy');
    Route::resource('projects', 'ProjectController');

       // apply
       Route::delete('applys/destroy', 'ApplyController@massDestroy')->name('applys.massDestroy');
       Route::resource('applys', 'ApplyController');
});

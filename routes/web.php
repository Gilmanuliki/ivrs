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

    // Total
    Route::delete('totals/destroy', 'TotalController@massDestroy')->name('totals.massDestroy');
    Route::resource('totals', 'TotalController');

    // Station
    Route::delete('stations/destroy', 'StationController@massDestroy')->name('stations.massDestroy');
    Route::resource('stations', 'StationController');

    // Source
    Route::delete('sources/destroy', 'SourceController@massDestroy')->name('sources.massDestroy');
    Route::resource('sources', 'SourceController');

    // Add Income
    Route::delete('add-incomes/destroy', 'AddIncomeController@massDestroy')->name('add-incomes.massDestroy');
    Route::resource('add-incomes', 'AddIncomeController');

    // Income Report
    Route::delete('income-reports/destroy', 'IncomeReportController@massDestroy')->name('income-reports.massDestroy');
    Route::resource('income-reports', 'IncomeReportController');
    Route::post('income-reports-by-date','IncomeReportController@incomeReportsByDate')->name('income-reports.filter');
    // Visitors Report
    Route::delete('visitors-reports/destroy', 'VisitorsReportController@massDestroy')->name('visitors-reports.massDestroy');
    Route::resource('visitors-reports', 'VisitorsReportController');
    Route::post('visitor-reports-by-date','VisitorsReportController@visitorReportsByDate')->name('visitor-reports.filter');
    
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

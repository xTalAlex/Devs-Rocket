<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('/settings', [App\Http\Controllers\SettingController::class,'index'] )->name('settings');
    Route::post('/settings', [App\Http\Controllers\SettingController::class,'store'] )->name('settings.store');
    
    Route::crud('user', 'UserCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('social', 'SocialCrudController');
    Route::crud('mail', 'MailCrudController');
    Route::crud('template', 'TemplateCrudController');
    Route::crud('template-element', 'TemplateElementCrudController');
}); // this should be the absolute last line of this file
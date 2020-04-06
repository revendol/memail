<?php

Route::group(['prefix'=>'memail','as'=>'memail.','namespace'=>'Radoan\Memail\Http\Controllers'],function (){
    Route::get('/emails', 'EmailCampaignController@index')->name('emails');
    Route::resource('/email-template', 'EmailTemplateController');
    Route::resource('/email-campaign', 'EmailCampaignController');
    Route::get('row-template/{id}','EmailTemplateController@raw')->name('email-template.raw');
});

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Login to admin
Auth::routes(['register' => false]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    return redirect()->route('web.sale.index');
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('web')->group(function () {
        Route::prefix('sale')->group(function () {
            Route::get('select', ['as' => 'web.sale.select', 'uses' => 'Web\SaleController@select']);
            Route::get('add', ['as' => 'web.sale.add', 'uses' => 'Web\SaleController@add']);
            Route::post('store', ['as' => 'web.sale.store', 'uses' => 'Web\SaleController@store']);
            Route::get('edit/{sale_id}/{sale_status}', ['as' => 'web.sale.edit', 'uses' => 'Web\SaleController@edit']);
            Route::post('update/{sale_id}', ['as' => 'web.sale.update', 'uses' => 'Web\SaleController@update']);
            Route::get('detail/{sale_id}', ['as' => 'web.sale.detail', 'uses' => 'Web\SaleController@detail']);
        });
    });
    
    Route::prefix('shared')->group(function () {
        Route::prefix('saleimg')->group(function () {
            Route::post('render/{sale_id}', ['as' => 'shared.saleimg.render', 'uses' => 'Admin\SaleimgController@render']);
            Route::post('upload/{sale_id}', ['as' => 'shared.saleimg.upload', 'uses' => 'Admin\SaleimgController@upload']);
            Route::post('delete/{sale_img_id}', ['as' => 'shared.saleimg.delete', 'uses' => 'Admin\SaleimgController@delete']);
        });
    
        Route::prefix('salevideo')->group(function () {
            Route::post('render/{sale_id}', ['as' => 'shared.salevideo.render', 'uses' => 'Admin\SalevideoController@render']);
            Route::post('upload/{sale_id}', ['as' => 'shared.salevideo.upload', 'uses' => 'Admin\SalevideoController@upload']);
            Route::post('delete/{sale_id}', ['as' => 'shared.salevideo.delete', 'uses' => 'Admin\SalevideoController@delete']);
        });
    });
    
    Route::prefix('admin')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('index', ['as' => 'admin.dashboard.index', 'uses' => 'Admin\DashboardController@index']);
        });
    
        // Owner
        Route::prefix('owner')->group(function () {
            Route::get('index', ['as' => 'admin.owner.index', 'uses' => 'Admin\OwnerController@index']);
            Route::get('add', ['as' => 'admin.owner.add', 'uses' => 'Admin\OwnerController@add']);
            Route::get('arrange', ['as' => 'admin.owner.arrange', 'uses' => 'Admin\OwnerController@arrange']);
            Route::post('store', ['as' => 'admin.owner.store', 'uses' => 'Admin\OwnerController@store']);
            Route::get('form-upload-excel', ['as' => 'admin.owner.form-upload-excel', 'uses' => 'Admin\OwnerController@formUploadExcel']);
            Route::post('upload-excel', ['as' => 'admin.owner.upload-excel', 'uses' => 'Admin\OwnerController@uploadExcel']);
            Route::get('edit/{owner_id}', ['as' => 'admin.owner.edit', 'uses' => 'Admin\OwnerController@edit']);
            Route::post('update/{owner_id}', ['as' => 'admin.owner.update', 'uses' => 'Admin\OwnerController@update']);
            Route::get('update-demand/{owner_id}/{owner_demand}', ['as' => 'admin.owner.update-demand', 'uses' => 'Admin\OwnerController@updateDemand']);
            Route::get('delete/{owner_id}', ['as' => 'admin.owner.delete', 'uses' => 'Admin\OwnerController@delete']);
            Route::get('truncate', ['as' => 'admin.owner.truncate', 'uses' => 'Admin\OwnerController@truncate']);
        });

        // Sale
        Route::prefix('sale')->group(function () {
            Route::get('raw', ['as' => 'admin.sale.raw', 'uses' => 'Admin\SaleController@raw']);
            Route::get('select', ['as' => 'admin.sale.select', 'uses' => 'Admin\SaleController@select']);
            Route::get('sold', ['as' => 'admin.sale.sold', 'uses' => 'Admin\SaleController@sold']);
            Route::get('add', ['as' => 'admin.sale.add', 'uses' => 'Admin\SaleController@add']);
            Route::post('store', ['as' => 'admin.sale.store', 'uses' => 'Admin\SaleController@store']);
            Route::get('edit/{sale_id}/{sale_status}', ['as' => 'admin.sale.edit', 'uses' => 'Admin\SaleController@edit']);
            Route::post('update/{sale_id}', ['as' => 'admin.sale.update', 'uses' => 'Admin\SaleController@update']);
            Route::get('delete/{sale_id}', ['as' => 'admin.sale.delete', 'uses' => 'Admin\SaleController@delete']);
            Route::get('status/{sale_id}/{sale_status}', ['as' => 'admin.sale.status', 'uses' => 'Admin\SaleController@status']);
        });
    
        Route::prefix('saletran')->group(function () {
            Route::get('index', ['as' => 'admin.saletran.index', 'uses' => 'Admin\SaletranController@index']);
            Route::get('edit/{sale_id}', ['as' => 'admin.saletran.edit', 'uses' => 'Admin\SaletranController@edit']);
            Route::post('update/{sale_id}', ['as' => 'admin.saletran.update', 'uses' => 'Admin\SaletranController@update']);
            Route::post('sold/{sale_id}', ['as' => 'admin.saletran.sold', 'uses' => 'Admin\SaletranController@sold']);
            Route::get('delete/{sale_id}', ['as' => 'admin.saletran.delete', 'uses' => 'Admin\SaletranController@delete']);
        });

        // Rent
        Route::prefix('rent')->group(function () {
            Route::get('raw', ['as' => 'admin.rent.raw', 'uses' => 'Admin\RentController@raw']);
            Route::get('select', ['as' => 'admin.rent.select', 'uses' => 'Admin\RentController@select']);
            Route::get('sold', ['as' => 'admin.rent.sold', 'uses' => 'Admin\RentController@sold']);
            Route::get('add', ['as' => 'admin.rent.add', 'uses' => 'Admin\RentController@add']);
            Route::post('store', ['as' => 'admin.rent.store', 'uses' => 'Admin\RentController@store']);
            Route::get('edit/{rent_id}/{rent_status}', ['as' => 'admin.rent.edit', 'uses' => 'Admin\RentController@edit']);
            Route::post('update/{rent_id}', ['as' => 'admin.rent.update', 'uses' => 'Admin\RentController@update']);
            Route::get('delete/{rent_id}', ['as' => 'admin.rent.delete', 'uses' => 'Admin\RentController@delete']);
            Route::get('status/{rent_id}/{rent_status}', ['as' => 'admin.rent.status', 'uses' => 'Admin\RentController@status']);
        });
    
        Route::prefix('rentran')->group(function () {
            Route::get('index', ['as' => 'admin.rentran.index', 'uses' => 'Admin\RentranController@index']);
            Route::get('edit/{rent_id}', ['as' => 'admin.rentran.edit', 'uses' => 'Admin\RentranController@edit']);
            Route::post('update/{rent_id}', ['as' => 'admin.rentran.update', 'uses' => 'Admin\RentranController@update']);
            Route::post('sold/{rent_id}', ['as' => 'admin.rentran.sold', 'uses' => 'Admin\RentranController@sold']);
            Route::get('delete/{rent_id}', ['as' => 'admin.rentran.delete', 'uses' => 'Admin\RentranController@delete']);
        });

        Route::prefix('rentimg')->group(function () {
            Route::post('render/{rent_id}', ['as' => 'admin.rentimg.render', 'uses' => 'Shared\RentimgController@render']);
            Route::post('upload/{rent_id}', ['as' => 'admin.rentimg.upload', 'uses' => 'Shared\RentimgController@upload']);
            Route::post('delete/{rent_img_id}', ['as' => 'admin.rentimg.delete', 'uses' => 'Shared\RentimgController@delete']);
        });
    
        Route::prefix('rentvideo')->group(function () {
            Route::post('render/{rent_id}', ['as' => 'admin.rentvideo.render', 'uses' => 'Shared\RentvideoController@render']);
            Route::post('upload/{rent_id}', ['as' => 'admin.rentvideo.upload', 'uses' => 'Shared\RentvideoController@upload']);
            Route::post('delete/{rent_id}', ['as' => 'admin.rentvideo.delete', 'uses' => 'Shared\RentvideoController@delete']);
        });
    
        // Contract
        Route::prefix('contract')->group(function () {
            Route::get('index', ['as' => 'admin.contract.index', 'uses' => 'Admin\ContractController@index']);
            Route::get('add', ['as' => 'admin.contract.add', 'uses' => 'Admin\ContractController@add']);
            Route::post('store', ['as' => 'admin.contract.store', 'uses' => 'Admin\ContractController@store']);
            Route::get('edit/{contract_id}', ['as' => 'admin.contract.edit', 'uses' => 'Admin\ContractController@edit']);
            Route::post('update/{contract_id}', ['as' => 'admin.contract.update', 'uses' => 'Admin\ContractController@update']);
            Route::get('delete/{contract_id}', ['as' => 'admin.contract.delete', 'uses' => 'Admin\ContractController@delete']);
        });
        
        // Notification
        Route::prefix('notification')->group(function () {
            Route::get('index', ['as' => 'admin.notification.index', 'uses' => 'Admin\NotificationController@index']);
            Route::get('send/{notification_id}/{notification_issend}', ['as' => 'admin.notification.send', 'uses' => 'Admin\NotificationController@send']);
            Route::get('add', ['as' => 'admin.notification.add', 'uses' => 'Admin\NotificationController@add']);
            Route::post('store', ['as' => 'admin.notification.store', 'uses' => 'Admin\NotificationController@store']);
            Route::get('edit/{notification_id}', ['as' => 'admin.notification.edit', 'uses' => 'Admin\NotificationController@edit']);
            Route::get('view/{notification_id}', ['as' => 'admin.notification.view', 'uses' => 'Admin\NotificationController@view']);
            Route::post('update/{notification_id}', ['as' => 'admin.notification.update', 'uses' => 'Admin\NotificationController@update']);
            Route::get('delete/{notification_id}', ['as' => 'admin.notification.delete', 'uses' => 'Admin\NotificationController@delete']);
        });
    
        // User
        Route::prefix('user')->group(function () {
            Route::get('index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
            Route::get('add', ['as' => 'admin.user.add', 'uses' => 'Admin\UserController@add']);
            Route::post('store', ['as' => 'admin.user.store', 'uses' => 'Admin\UserController@store']);
            Route::get('edit/{user_id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit']);
            Route::post('update/{user_id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update']);
            Route::get('delete/{user_id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@delete']);
        });
    
        // Authorization
        Route::prefix('authorization')->group(function () {
            Route::get('index', ['as' => 'admin.authorization.index', 'uses' => 'Admin\AuthorizationController@index']);
            Route::get('add', ['as' => 'admin.authorization.add', 'uses' => 'Admin\AuthorizationController@add']);
            Route::post('store', ['as' => 'admin.authorization.store', 'uses' => 'Admin\AuthorizationController@store']);
            Route::get('edit/{authorization_id}', ['as' => 'admin.authorization.edit', 'uses' => 'Admin\AuthorizationController@edit']);
            Route::post('update/{authorization_id}', ['as' => 'admin.authorization.update', 'uses' => 'Admin\AuthorizationController@update']);
            Route::get('delete/{authorization_id}', ['as' => 'admin.authorization.delete', 'uses' => 'Admin\AuthorizationController@delete']);
        });
    });

});

// Clear cache - route
Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    dd("Cache Clear All");
});
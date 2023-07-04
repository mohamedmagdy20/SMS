<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ClassController;
use App\Http\Controllers\Dashboard\DistributionController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SemseterController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\SubjectController;
use App\Http\Controllers\Dashboard\TeacherController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>'auth','prefix'=>'dashboard'],function(){


    Route::group(['controller'=>AdminController::class,'prefix'=>'admins'], function (){
        $route = 'dashboard.admins.';
        Route::get('index','index')->name($route.'index');
        Route::get('data','data')->name($route.'data');
        Route::get('create','create')->name($route.'create');
        Route::get('edit/{id}','edit')->name($route.'edit');
        Route::get('delete/{id}','delete')->name($route.'delete');
        Route::post('store','store')->name($route.'store');
        Route::post('update/{id}','update')->name($route.'update');
       
    });


    Route::group(['controller'=>RolesController::class,'prefix'=>'roles'], function (){
        $route = 'dashboard.roles.';
        Route::get('index','index')->name($route.'index');
        Route::get('data','data')->name($route.'data');
        Route::get('create','create')->name($route.'create');
        Route::get('edit/{id}','edit')->name($route.'edit');
        Route::post('store','store')->name($route.'store');
        Route::post('update/{id}','update')->name($route.'update');
       
    });



    Route::group(['controller'=>PermissionController::class,'prefix'=>'permissions'], function (){
        $route = 'dashboard.permission.';
        Route::get('index/{id}','index')->name($route.'index');
        Route::post('update/{id}','updatePermission')->name($route.'update');
       
    });


    
    Route::group(['controller'=>SubjectController::class,'prefix'=>'subjects'], function (){
        $route = 'dashboard.subjects.';
        Route::get('index','index')->name($route.'index');
        Route::get('data','data')->name($route.'data');
        Route::get('create','create')->name($route.'create');
        Route::get('edit/{id}','edit')->name($route.'edit');
        Route::get('delete/{id}','delete')->name($route.'delete');
        Route::post('store','store')->name($route.'store');
        Route::post('update/{id}','update')->name($route.'update');
       
    });


    
    Route::group(['controller'=>SemseterController::class,'prefix'=>'semester'], function (){
        $route = 'dashboard.semester.';
        Route::get('index','index')->name($route.'index');
        Route::get('data','data')->name($route.'data');
        Route::get('create','create')->name($route.'create');
        Route::get('edit/{id}','edit')->name($route.'edit');
        Route::get('delete/{id}','delete')->name($route.'delete');
        Route::post('store','store')->name($route.'store');
        Route::post('update/{id}','update')->name($route.'update');
       
    });



    Route::group(['controller'=>ClassController::class,'prefix'=>'classes'], function (){
        $route = 'dashboard.classes.';
        Route::get('index','index')->name($route.'index');
        Route::get('data','data')->name($route.'data');
        Route::get('create','create')->name($route.'create');
        Route::get('edit/{id}','edit')->name($route.'edit');
        Route::get('delete/{id}','delete')->name($route.'delete');
        Route::post('store','store')->name($route.'store');
        Route::post('update/{id}','update')->name($route.'update');
       
    });




    
    Route::group(['controller'=>TeacherController::class,'prefix'=>'teachers'], function (){
        $route = 'dashboard.teachers.';
        Route::get('index','index')->name($route.'index');
        Route::get('data','data')->name($route.'data');
        Route::get('create','create')->name($route.'create');
        Route::get('edit/{id}','edit')->name($route.'edit');
        Route::get('delete/{id}','delete')->name($route.'delete');
        Route::post('store','store')->name($route.'store');
        Route::post('update/{id}','update')->name($route.'update');
       
    });


    Route::group(['controller'=>StudentController::class,'prefix'=>'students'], function (){
        $route = 'dashboard.students.';
        Route::get('index','index')->name($route.'index');
        Route::get('data','data')->name($route.'data');
        Route::get('create','create')->name($route.'create');
        Route::get('edit/{id}','edit')->name($route.'edit');
        Route::get('delete/{id}','delete')->name($route.'delete');
        Route::post('store','store')->name($route.'store');
        Route::post('update/{id}','update')->name($route.'update');
    });


    

    Route::group(['controller'=>DistributionController::class,'prefix'=>'distribution'], function (){
        $route = 'dashboard.distribution.';
        Route::get('index','index')->name($route.'index');
        Route::get('data','data')->name($route.'data');
        Route::get('create','create')->name($route.'create');
        Route::get('edit/{id}','edit')->name($route.'edit');
        Route::get('delete/{id}','delete')->name($route.'delete');
        Route::post('store','store')->name($route.'store');
        Route::post('update/{id}','update')->name($route.'update');
       
    });





});

require __DIR__.'/auth.php';

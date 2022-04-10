<?php

Route::get('/', function () {
    return view('welcome');
});




Route::get('User/{id}',function($id){
    echo 'User ID: '.$id;
});


Route::get('user/{name?}', function ($name = 'TutorialsPoint') {
    return $name;
});




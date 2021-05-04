<?php

use src\App\Route;
use src\Controller\DeleteController;
use src\Controller\ViewController;

Route::get("/", "ViewController@index");
Route::get("/phone", "ViewController@phone");
Route::get("/history", "ViewController@history");
Route::get("/month", "ViewController@month");
Route::get("/year", "ViewController@year");

Route::get("/sub1", "ViewController@sub1");
Route::get("/sub1/{data}", "ViewController@sub1Data");
Route::post("/sub1/insert", "InsertController@sub1Insert");
Route::get("/sub1/update/{idx}", "ViewController@sub1Update");
Route::post("/sub1/update", "UpdateController@sub1Update");
Route::get("/sub1/delete/{idx}", "DeleteController@sub1Delete");
Route::get("/sub1/delete/image/{idx}", "UpdateController@sub1ImageDelete");

Route::get("/month", "ViewController@month");
Route::post("/month/insert", "InsertController@monthInsert");
Route::get("/month/update/{idx}", "ViewController@monthView");
Route::post("/month/update", "UpdateController@monthUpdate");
Route::get("/month/delete/{idx}", "DeleteController@monthDelete");

Route::get("/year/{year}", "ViewController@year");
Route::post("/year/insert", "InsertController@yearInsert");
Route::get("/year/update/{idx}", "ViewController@yearView");
Route::post("/year/update", "UpdateController@yearUpdate");
Route::get("/year/delete/{idx}", "DeleteController@yearDelete");

Route::get("/openAPI/nihList.php", "ViewController@openAPI");
Route::get("/openAPI/showList.php", "ViewController@openAPIs");
Route::get("/getImage/{name}", "ViewController@getImage");

Route::get("/sub/info/1", "ViewController@sub1Info");
Route::get("/sub/info/2", "ViewController@sub2Info");

Route::init();
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', function () {
    return view('create');
});

Auth::routes();

// Route::get('/index', 'HomeController@index')->name('index');

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Route::get('/index','UserController@index')->name('user.index');

Route::get('/create','UserController@create');
Route::post('/create','UserController@store');

Route::get('image', 'ImageController@index');
Route::get('save', 'ImageController@save');

 Route::get('pdf_form', 'PdfController@pdfForm');
 Route::get('pdf_download', 'PdfController@pdfDownload');

 

 //Simple Qr code :
Route::get('qrcode', function () {
    return QrCode::size(300)->generate('A basic example of QR code!');
});

//QR Code with Color :
/*Route::get('qrcode-with-color', function () {
    return \QrCode::size(300)
                    ->backgroundColor(255,55,0)
                    ->generate('A simple example of QR code');
});*/

//Email QR code :
//Route::get('qrcode-with-special-data', function() {
   // return \QrCode::size(300)
    //            ->email('somnuek159@outlook.com', 'Hello Mr.Somnuek Mueanprasan', 'This is !.');
//}); 

//QR Code Phone Number :
//QrCode::phoneNumber('0943580381');

//QR Code Text Message
//QrCode::SMS('111-222-6666', 'Body of the message');




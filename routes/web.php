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
use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert',function()
{
	$user=User::findOrFail(1);
	$address=new Address(['name'=>'peter']);
	$user->address()->save($address);	
});
Route::get('/update',function()
{
	$address=Address::whereUserId(1)->first();
	$address->name="updated name";
	$address->save();


});

Route::get('/read',function()
{
	$user=User::findOrFail(1);
	$data=$user->address->name;
	echo $data;
});

Route::get('/delete',function()
{
	$user=User::findOrFail(1);
	$user->address()->delete();	
	if($user)
	{
		return "done";
	}

});
// Route::get('/insert/{name?}',function($name)
// {
// 	$user=User::findOrFail(1);
// 	$address=new Address(['name'=>$name]);
// 	$user->address()->save($address);	
// });

// Route::get('/update/{id?}',function($id)
// {
// 	$address=Address::whereUserId($id)->first();
// 	$address->name="updated name";
// 	$address->save();


// });

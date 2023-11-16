<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Statamic\Facades\Entry;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);


Route::post('/addBook', function (Request $request) {
	$entry = Entry::whereCollection('books')->where('id', $request->get('id'))->first();
	if ($entry) {
		$entry->set('is_added', !$entry->get('is_added'));
		$entry->save();
	}
	// Cache::forget('books');
	return redirect('/');
});

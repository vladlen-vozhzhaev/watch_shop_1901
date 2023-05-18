<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $items = \App\Models\Item::all();
    return view('pages.mainPage', ['items'=>$items]);
});
Route::view('/addItem', 'pages.addItem');
Route::post('/addItem', [\App\Http\Controllers\ItemController::class, 'addItem']);
Route::get('/productDetails/{id}', function (\Illuminate\Http\Request $request){
    $itemId = $request->id;
    $item = \App\Models\Item::where('id', $itemId)->first();
    return view('pages.productDetails', ['item'=>$item]);
});
Route::get("/cart", [CartController::class, 'showCart'])->middleware(['auth']);
Route::get("/cart/addItem/{item_id}", [CartController::class, 'addItem'])->middleware(['auth']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

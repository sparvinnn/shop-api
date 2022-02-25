<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

//register new user
Route::post('/create-account', [AuthenticationController::class, 'createAccount']);
//login user
Route::post('/signin', [AuthenticationController::class, 'signin']);
//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post('/sign-out', [AuthenticationController::class, 'signout']);
    Route::post('/me', [AuthenticationController::class, 'me']);
});

?>
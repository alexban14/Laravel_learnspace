<?php

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

// Route::get('/', function () {
//     return view('welcome');
// }); // this is a closure

Route::get('/', 'TasksController@index');

Route::get('/tasks/create', 'TasksController@create');
Route::get('tasks', 'TasksController@store');

// resource controller binding
Route::resource('tasks', 'TasksController');

// route for single action controller
Route::post('users/{user}/update-avatar', 'UpdateUserAvatar');

Route::get('users/{id}/friends', function ($id) {
    //
});
// Optional route parameters
Route::get('users/{id?}', function ($id = 'fallbackId') {
    //
});

// you can use regular expressions (regexes) to define that a route should only
// match if a parameter meets particular requirements
Route::get('posts/{id}/{slug}', function ($id, $slug) {
    //
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z]+']);

// Definig route names
Route::get('members/{id}', 'MembersController@show')->name('members.show');

// Linking the route in a view using the route() helper:
// route('members.show', ['id' => 14]);>


// Passing Route Parameters to the route() Helper

// 1
/* route('users.comments.show', [1, 2])
   http://myapp.com/users/1/comments/2 */

// 2
/* route('users.comments.show', ['userId' => 1, 'commentId' => 2])
    /http://myapp.com/users/1/comments/2 */


// Route Groups
Route::group(function () {
    Route::get('hello', function () {
        return 'Hello';
    });
    Route::get('world', function () {
        return 'World';
    });
});

// Restricting a group of routes to logged-in users only
Route::middleware('auth')->group(function() {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
    Route::get('account', function () {
        return view('account');
    });
});

// Rate limiting
Route::middleware('auth:api', 'throttle:60,1')->group(function () {
    Route::get('/profile', function () {
        //
    });
});

// Path Prefixes
// If you have a group of routes that share a segment of their path
Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        // Handles the path /dashboard
    });
    Route::get('users', function () {
        // Handles the path /dashboard/users
    });
});

// Fallback routes
Route::any('{anything}', 'CatchAllController')->where('anything', '*');
// laravel 5.6+ =>
Route::fallback(function () {
    //
});

// Subdomain routing
Route::domain('api.myapp.com')->group(function () {
    Route::get('/', function () {
        //
    });
});

// Namespace prefixes
Route::get('/', 'UsersController@index');

Route::namespace('Dashboard')->group(function () {
    // App\Http\Controllers\Dashboard\PurchasesController
    Route::get('dashboard/purchases', 'PurchasesController@index');
});

// Name Prefixes
Route::name('users.')->prefix('users')->group(function () {
    Route::name('comments.')->prefix('comments')->group(function () {
        Route::get('{id}', function () {
            //
        })->name('show');
    });
});


// Signing a route
Route::get('invitations/{invitation}/{answer}', 'InvitationController')
    ->name('invitations');

// Generate a normal link
URL::route('invitations', ['invitation' => 12345, 'answer' => 'yes']);

// Generate a signed link
URL::signedRoute('invitations', ['invitation' => 12345, 'answer' => 'yes']);

// Generate an expiring (temporary) signed link
URL::temporarySignedRoute(
    'invitations',
    now()->addHours(4),
    ['invitation' => 12345, 'answer' => 'yes']
);

// Protect signed routes againts any unsigned access
Route::get('invitations/{invitation}/{answer}', 'InvitationController')
    ->name('invitations')
    ->middleware('signed');


// Passing variables to views
Route::get('tasks', function () {
    return view('tasks.index');
    // ->with('tasks', Task::all());
});

// Simple Routes
Route::view('/', 'welcome', ['User' => 'Michael']);

//View composers, share variables with every view
view()->share('variableName', 'variableValue');

// Route model binding
Route::get('conferences/{id}', function ($id) {
    $conference = Conference::findOrFail($id);
});

// implicit route model binding
Route::get('conferences/{conference}', function (Conference $conference) {
    return view('conferences.show')->with('conference', $conference);
});

// Redirecting
// Using the global helper to generate a redirect response
Route::get('redirect-with-helper', function () {
    return redirect()->to('login');
});
    // Using the global helper shortcut
Route::get('redirect-with-helper-shortcut', function () {
    return redirect('login');
});
    // Using the facade to generate a redirect response
Route::get('redirect-with-facade', function () {
    return Redirect::to('login');
});
    // Using the Route::redirect shortcut in Laravel 5.5+
Route::redirect('redirect-by-route', 'login');

// Example 3-41. redirect()->route() with parameters
Route::get('redirect', function () {
    return redirect()->route('conferences.show', ['conference' => 99]);
});

// Example 3-42. Redirect with data
Route::get('redirect-with-key-value', function () {
    return redirect('dashboard')
        ->with('error', true);
});
Route::get('redirect-with-array', function () {
    return redirect('dashboard')
        ->with(['error' => true, 'message' => 'Whoops!']);
});

// Example 3-44. Redirect with errors
Route::post('form', function (Illuminate\Http\Request $request) {
    $validator = Validator::make($request->all(), $this->validationRules);
    if ($validator->fails()) {
    return back()
        ->withErrors($validator)
        ->withInput();
    }
});

// Custom Responses
// response()->make();
// // response()->json() and ->jsonp();
// response()->json()->jsonp();
// // response()->download(), ->streamDownload(), and ->file();
// response()->download()->streamDownload(), and ->file();

// // Example 3-46. Streaming downloads from external servers
// return response()->streamDownload(function () {
//     echo DocumentService::file('myFile')->getContent();
// }, 'myFile.pdf');

Route::get('home', function () {
    return view('home')
        ->with('posts', Post::recent());
});

Route::get('about', function () {
    return view('about')
        ->with('posts', Post::recent());
});

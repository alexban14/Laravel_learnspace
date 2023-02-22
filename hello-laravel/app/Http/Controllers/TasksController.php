<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return 'Hello World!';
    }

    public function create()
    {
        // We’re using the request() helper to represent the HTTP request
        Task::create(request()->only(['title', 'description']));
        // and using its only() method to pull just the title and description fields the user submitted.

        return redirect('tasks');
    }

    // Controller method injection via typehinting
	public function store(\Illuminate\Http\Request $request)
	{
		Task::create($request->only(['title', 'description']));
		return redirect('tasks');
	}

	// Single action controller => the __invoke() method is a PHP magic method that
	// allows you to “invoke” an instance of a class
	public function __invoke(User $user)
	{
	// Update the user's avatar image
	}

	// custom route model binding
	public function boot()
	{
		// Just allows the parent's boot() method to still run
		parent::boot();
		// Perform the binding
		Route::model('event', Conference::class);
	}
}

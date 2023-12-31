<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hobbies = Hobby::select()
            ->where("user_id", auth()->id())
            ->orderBy("updated_at", "DESC")
            ->get();

        return view(
            'home',
            ["hobbies" => $hobbies]
        );
    }
}
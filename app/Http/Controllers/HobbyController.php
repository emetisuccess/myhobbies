<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Http\Requests\StoreHobbyRequest;
use App\Http\Requests\UpdateHobbyRequest;

class HobbyController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except(["index", "show"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hobbies = Hobby::orderBy("created_at", "desc")->paginate(10);
        return view("hobby.index", ["hobbies" => $hobbies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("hobby.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHobbyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHobbyRequest $request)
    {
        $hobbies = Hobby::create([
            "name" => $request->name,
            "description" => $request->description,
            "user_id" => auth()->id()
        ]);
        return redirect('/hobby')->with(['success' => "New Hobby " . $hobbies->name . " was created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function show(Hobby $hobby)
    {
        return view("hobby.show", ["hobby" => $hobby]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Hobby $hobby)
    {
        return view("hobby.edit", ["hobby" => $hobby]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHobbyRequest  $request
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHobbyRequest $request, Hobby $hobby)
    {
        $hobby = Hobby::where("id", $hobby->id)->update([
            "name" => $request->name,
            "description" => $request->description
        ]);

        return redirect("/hobby")->with("success", "Hobby " . $request->name . " was updated");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobby $hobby)
    {
        Hobby::where("id", $hobby->id)->delete();
        return redirect()->back()->with("success", "Hobby " . $hobby->name . " was Deleted!");
    }
}
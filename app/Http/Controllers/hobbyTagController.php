<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\Tag;
use Illuminate\Http\Request;

class hobbyTagController extends Controller
{
    public function getFilteredHobbies($tag_id)
    {
        $hobbies = Tag::findOrFail($tag_id)->filteredHobbies()->paginate(10);
        $filter  = Tag::find($tag_id);

        return view(
            "hobby.index",
            ["hobbies" => $hobbies],
            ["filter" => $filter]
        );
    }

    public function attachTag($hobby_id, $tag_id)
    {
        $hobby = Hobby::find($hobby_id);
        $tag   = Tag::find($tag_id);
        $hobby->tags()->attach($tag_id);

        return redirect()->back()->with("success", "Tag " . $tag->name . " was Added.");
    }

    public function detachTag($hobby_id, $tag_id)
    {
        $hobby = Hobby::find($hobby_id);
        $tag   = Tag::find($tag_id);
        $hobby->tags()->detach($tag_id);

        return redirect()->back()->with("success", "Tag " . $tag->name . " was Removed.");
    }
}
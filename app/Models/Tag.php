<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tags";
    protected $fillable = ["name", "style"];

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function filteredHobbies()
    {
        return $this->belongsToMany(Hobby::class)->wherePivot('tag_id', $this->id)->orderBy("updated_at", "DESC");
    }
}
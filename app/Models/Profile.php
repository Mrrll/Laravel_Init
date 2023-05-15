<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadImage;

class Profile extends Model
{
    use HasFactory, UploadImage;

    /* `protected  = [];` is a property in the `Profile` model class that specifies which
    attributes are not mass assignable. When an array of data is passed to create or update a model
    instance, only the attributes listed in the `` property will be mass assignable by
    default. However, if the `` property is set to an empty array, all attributes will be
    mass assignable. If the `` property is not set, all attributes will be guarded by
    default. */
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'first_name';
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

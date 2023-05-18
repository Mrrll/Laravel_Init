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
    
    /**
     * This function defines a polymorphic relationship between the current model and the Image model
     * in PHP.
     *
     * @return The `image()` function is returning a `morphMany` relationship between the current model
     * and the `Image` model. This relationship allows the current model to have multiple images
     * associated with it, and the `imageable` field in the `Image` model is used to store the type and
     * ID of the associated model.
     */
    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * This function defines a relationship between the current model and the User model in PHP.
     *
     * @return A relationship between the current model and the User model is being returned.
     * Specifically, it is a "belongsTo" relationship, indicating that the current model belongs to a
     * single User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

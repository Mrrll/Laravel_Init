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
     * This function returns the name of the route key for a model in PHP.
     *
     * @return the string 'first_name'. This function is used in Laravel to override the default
     * primary key column name used in route model binding. By default, Laravel uses the 'id' column as
     * the primary key for route model binding. However, by defining this function in a model, we can
     * use a different column as the primary key for route model binding. In this case, the '
     */
    public function getRouteKeyName()
    {
        return 'first_name';
    }

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

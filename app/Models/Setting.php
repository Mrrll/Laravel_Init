<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadImage;

class Setting extends Model
{
    use HasFactory, UploadImage;

    /* `protected  = [];` is a property in the `Setting` model class that specifies which
    attributes are not mass assignable. When an array is assigned to ``, it means that those
    attributes cannot be mass assigned. In this case, an empty array `[]` is assigned to ``,
    which means that all attributes are mass assignable. */
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

    // Relación uno a uno (inversa)
    /**
     * This function defines a relationship between the current model and the User model in PHP.
     *
     * @return A relationship between the current model and the User model is being returned.
     * Specifically, a "belongsTo" relationship is being defined, indicating that the current model
     * belongs to a User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

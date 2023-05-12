<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /* `protected  = [];` is a property in the `Image` model class that specifies which
    attributes are not mass assignable. When an array of data is passed to create or update a model
    instance, only the attributes listed in the `` property will be mass assignable by
    default. However, if the `` property is set to an empty array, all attributes will be
    mass assignable. In this case, the `` property is set to an empty array, which means all
    attributes are mass assignable. */
    protected $guarded = [];

    /**
     * This function returns a polymorphic relationship for an imageable model.
     *
     * @return The `imageable()` function is returning a polymorphic relationship between the current
     * model and other models that can have images associated with them. The `morphTo()` method is used
     * to define this relationship.
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}

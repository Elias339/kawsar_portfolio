<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'profile',
        'logo',
        'phone',
        'email',

        'banner_title',
        'profession',
        'banner_image',
        'resume',
        'about_title',
        'about_description',

        'linkedin',
        'facebook',
        'instagram',
        'youtube',
        'behance',
        'dribbble',
        'pinterest',
        'twitter',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'designation',
        'email',
        'description',
        'profile',
        'logo',
        'long_description',
        'foot_text',
        'phone',

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

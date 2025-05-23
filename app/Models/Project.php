<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
       'project_category_id',
       'name',
       'title',
       'description',
       'image',
       'status',
    ];

    public function projectCategory()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
}

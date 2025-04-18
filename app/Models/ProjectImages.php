<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'order'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public $timestamps = false;

    //one to many relationship with the User object
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

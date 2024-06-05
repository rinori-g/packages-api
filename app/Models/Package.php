<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'name', 'limit'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}

<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'company',
        'email',
        'address',
        'postcode',
        'phone',
        'contact',
        'mobile',
    ];

    protected $searchableFields = ['*'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function hires()
    {
        return $this->hasMany(Hire::class);
    }
}

<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'value'];

    protected $searchableFields = ['*'];

    public $timestamps = false;
}

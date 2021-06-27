<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Qr extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['label', 'tankers_id'];

    protected $searchableFields = ['*'];

    public function tankers()
    {
        return $this->belongsTo(Tanker::class, 'tankers_id');
    }
}

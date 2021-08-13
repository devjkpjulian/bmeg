<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Regional extends Model
{
    use Searchable;
    use HasFactory;

    protected $guarded = [];
    protected $table = "regionals";

    public function regional_location()
    {
        return $this->belongsTo(RegionalLocation::class);
    }
}

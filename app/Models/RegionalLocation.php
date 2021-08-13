<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class RegionalLocation extends Model
{
    use Searchable;
    use HasFactory;

    protected $guarded = [];
    protected $table = "regional_locations";

    public function regionals()
    {
        return $this->hasMany(Regional::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalVideo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'national_videos';

    public function national()
    {
        return $this->belongsTo(National::class);
    }
}

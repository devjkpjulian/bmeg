<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloodline extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'bloodlines';

    public function national()
    {
        return $this->belongsTo(National::class);
    }

    public function images()
    {
        return $this->hasMany(BloodlineImage::class);
    }
}

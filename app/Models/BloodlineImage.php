<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodlineImage extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'bloodline_images';

    public function national()
    {
        return $this->belongsTo(National::class);
    }

    public function bloodline()
    {
        return $this->belongsTo(Bloodline::class);
    }
}

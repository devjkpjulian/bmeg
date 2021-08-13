<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'achievements';

    public function national()
    {
        return $this->belongsTo(National::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleTrend extends Model
{
    use HasFactory;

    protected $fillable = ['gt_query', 'gt_value', 'gt_format', 'gt_link'];

    protected $hidden = ['created_at', 'updated_at'];
}

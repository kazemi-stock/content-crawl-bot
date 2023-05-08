<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['t_list_id', 't_board_id', 't_key', 't_token', 'line_number', 'signature', 'checklist_status'];

    protected $hidden = ['created_at', 'updated_at'];
}

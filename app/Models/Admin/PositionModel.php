<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model
{
    use HasFactory;
    protected $table = 'position_models';

    protected $fillable = [
        'name',
        'election_id'
    ];
}

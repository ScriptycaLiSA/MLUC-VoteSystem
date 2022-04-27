<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionModel extends Model
{
    use HasFactory;
    protected $table = 'election_models';
    protected $fillable = ['status', 'start', 'end', 'name'];
    public $timestamps = false;
}

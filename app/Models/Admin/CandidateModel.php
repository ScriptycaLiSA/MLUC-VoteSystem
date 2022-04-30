<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateModel extends Model
{
    use HasFactory;

    protected $table = ['candidate_models'];
    protected $fillable = [
        'name',
        'college_init',
        'election_id',
        'partylist_id',
        'position_id',
        'image',
        'description',
    ];
}

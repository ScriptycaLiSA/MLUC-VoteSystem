<?php

namespace App\Models;

use App\Models\VoterModel;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;

class VoterMgmtImport implements ToModel, WithUpserts, WithUpsertColumns
{
    public function model(array $row): \App\Models\VoterModel
    {
        return new VoterModel([
            'idNum'=>$row[0],
            'lname'=>$row[1],
            'fname'=>$row[2],
            'mname'=>$row[3],
            'password'=>$row[4],
            'college_init'=>$row[5],
        ]);
    }

    /**
     * @return array
     */
    public function upsertColumns(): array
    {
        return ['idNum','lname','fname','mname','college_init','password'];
    }

    public function uniqueBy()
    {
        // TODO: Implement uniqueBy() method.
    }
}

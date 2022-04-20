<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\VoterModel;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;

class VoterMgmtImport implements ToModel, WithUpserts, WithUpsertColumns
{
    public function model(array $row): \App\Models\VoterModel
    {
        return new VoterModel([
            'idNum'=>$row[0],
            'fname'=>$row[1],
            'lname'=>$row[2],
            'college'=>$row[3]
        ]);
    }

    /**
     * @return array
     */
    public function upsertColumns(): array
    {
        return ['fname','lname','college'];
    }

    public function uniqueBy()
    {
        // TODO: Implement uniqueBy() method.
    }
}

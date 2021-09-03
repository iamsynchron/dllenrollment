<?php

namespace App\Exports;

use App\Models\IDNumbers;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IDNumberExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{

    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        //return IDNumbers::all();
        return IDNumbers::query()->where('type', '!=', 5);
    }


    public function headings():array{
        return[
            'ID Number',
            'Full Name (By Admission)',
            'Code',
            'Type'
        ];
    }

    public function map($idnumber): array
    {
        if($idnumber->type == 1){
            $idnumber->type = 'New';
        }
        elseif($idnumber->type == 2){
            $idnumber->type = 'Old';
        }
        elseif($idnumber->type == 3){
            $idnumber->type = 'Transferee';
        }
        elseif($idnumber->type == 4){
            $idnumber->type = 'Cross Enrollee';
        }
        return [
            $idnumber->id,
            $idnumber->name,
            $idnumber->code,
            $idnumber->type,
        ];
    }

    
    public function fields(): array
    {
        return [
            'id',
            'name',
            'code',
            'type'
        ];
    }


    
}

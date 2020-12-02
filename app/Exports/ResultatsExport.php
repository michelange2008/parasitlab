<?php

namespace App\Exports;

use App\Models\Productions\Export;
use Carbon\Carbon;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ResultatsExport implements FromQuery, WithHeadings,  WithColumnFormatting, WithMapping, ShouldAutoSize
{
    use exportable;

    public function headings(): array
    {
      return [
        'id',
        'nom',
        'cp',
        'commune',
        'espèce',
        'troupeau',
        'demande_id',
        'resultat_id',
        'melange',
        'animal_numero',
        'animal_nom',
        'date_prelevement',
        'date_resultat',
        'parasite',
        'positif',
        'valeur',
        'estParasite',
        'signes',
      ];
    }
    public function map($export): array
    {
        return [
          $export->id,
          $export->nom,
          $export->cp,
          $export->commune,
          $export->espece,
          $export->troupeau,
          $export->demande_id,
          $export->resultat_id,
          $export->estMelange,
          $export->animal_numero,
          $export->animal_nom,
          Date::dateTimeToExcel(new Carbon($export->date_prelevement)),
          Date::dateTimeToExcel(new Carbon($export->date_resultat)),
          $export->parasite,
          $export->positif,
          $export->valeur,
          $export->estParasite,
          $export->signes,
        ];
    }

    public function columnFormats(): array
    {
        return [
          'K' => NumberFormat::FORMAT_DATE_DDMMYYYY,
          'L' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Export::query();
    }
}

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
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ResultatsExport implements FromQuery, WithHeadings,  WithColumnFormatting, WithMapping, ShouldAutoSize, WithStrictNullComparison
{
    use exportable;

    protected $headings;

    public function __construct($headings)
    {
      $this->headings = $headings;
    }

    public function headings(): array
    {
      return $this->headings;
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

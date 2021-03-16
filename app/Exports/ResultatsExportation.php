<?php

namespace App\Exports;

// use App\Models\Productions\Exportation;
use Carbon\Carbon;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;

class ResultatsExportation implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{

  protected $resultats;
  protected $entete;

  public function __construct($entete, $resultats)
  {
    $this->entete = $entete;
    $this->resultats = $resultats;
  }

  public function headings(): array
  {
    return $this->entete;
  }

  public function styles(Worksheet $sheet)
{
    $sheet->getStyle(1)->getFont()->setBold(true);
    $sheet->getStyle("A")->getAlignment()->applyFromArray(
      ['horizontal' => "left"]
    );
    $sheet->getStyle("B")->getAlignment()->applyFromArray(
      ['horizontal' => "left"]
    );

}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->resultats;
    }
}

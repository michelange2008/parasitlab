<?php

namespace App\Exports;

use Carbon\Carbon;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;

/**
 * Génère des fichiers tableurs à la demande de ExportsController
 *
 * Classe qui hérite de différentes classes du package Maatwebsite\Excel
 *
 * @package Interne
 */
class ResultatsExportation implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{

  /**
   * résultats d'analyse à mettre dans le tableau
   * @var array
   */
  protected $resultats;
  /**
   * En-têtes de colonne à mettre dans le tableau
   * @var array
   */
  protected $entete;

  /**
   * Constructeur simple qui peuple les variables
   * @param array $entete    en-têtes des colonnes
   * @param array $resultats résultats d'analyses (une ligne par sous-tableau)
   */
  public function __construct($entete, $resultats)
  {
    $this->entete = $entete;
    $this->resultats = $resultats;
  }

  /**
   * Construit les en-têtes
   * @return array [description]
   */
  public function headings(): array
  {
    return $this->entete;
  }

  /**
   * Permet d'appliquer des styles : gras, alignement, ...
   * @param  Worksheet $sheet [description]
   */
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
    * Renvoie les résultats
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->resultats;
    }
}

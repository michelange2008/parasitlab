<?php

namespace App\Http\Controllers;

use App\Http\Traits\LitJson;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Gestions des fichiers pdf: formulaires de demande d'analyse,
 * tarifs, ...
 * 
 */
class FilesController extends Controller
{
    use LitJson;
    /**
     * Liste les pdf utilisés en téléchargement 
     *
     * formulaires de prélèvement, méthodes, tarifs, ...
     *
     * @return view
     **/
    public function index(): View
    {
        $dir = 'storage/pdf';
        $files = scandir($dir);

        return view('admin.files.indexFiles', [
            'menu' => $this->litJson('menuLabo'),
            'files' => $files,
        ]);
    }
}

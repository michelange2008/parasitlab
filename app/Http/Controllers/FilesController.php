<?php

namespace App\Http\Controllers;

use App\Http\Traits\LitJson;
use App\Models\File;
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
        $db_files = File::all();
        $extensions = config('constantes.EXTENSIONS');
        // On vérifie que tous les fichiers présents dans le répertoire sont aussi dans la base de données
        // Sinon on les ajoute
        foreach ($files as $file) {
            $nom_file = explode('.', $file)[0];
            $extension_file = explode('.', $file)[1];
            if ($db_files->where('nom', $file)->isEmpty() && in_array($extension_file, $extensions)) {
                $new_file = new File();
                $new_file->nom = $file;
                $new_file->description = $nom_file;
                $new_file->extension = $extension_file;
                $new_file->save();
                $db_files = File::all();
            }
        }
        // On vérifie que tous les enregistrements de la table files correspondent à un fichier
        // Si ce n'est pas le cas on donne la valeur true à orphelin (sinon on donne la valeur false)
        foreach ($db_files as $db_file) {
            if (!in_array($db_file->nom, $files)) {
                $db_file->orphelin = true;
            } else {
                $db_file->orphelin = false;
            }
        }

        return view('admin.files.indexFiles', [
            'menu' => $this->litJson('menuLabo'),
            'files' => $files,
            'db_files' => $db_files,
        ]);
    }
    /**
     * Crée un fichier
     *
     * @return View 
     **/
    public function create()
    {
        
        return view('admin.files.createFile', [
            'menu' => $this->litJson('menuLabo'),
        ]);
    }

    /**
     * Enregistre un fichier
     *
     * @param Request $request 
     * @return view
     **/
    public function store(Request $request)
    {
        return redirect()->route('files.index')->with('message', 'Le fichier a été créé');
    }
    /**
     * Modifie un fichier
     *
     * changement de nom, téléchargement d'un nouveau fichier, etc.
     *
     * @param File $file fichier concerné
     * @return View 
     **/
    public function edit(File $file)
    {
        
        return view('admin.files.editFile', [
            'menu' => $this->litJson('menuLabo'),
            'file' => $file,
        ]);
    }

    /**
     * Met à jour un fichier
     *
     * @param Request $request 
     * @param File $file
     * @return view
     **/
    public function update(Request $request, File $file)
    {
        
        return redirect()->route('files.index')->with('message', 'fichier mis à jour');
    }

    /**
     * Affiche une page de confirmation de suppression de fichier
     *
     * @param File $file
     * @return view
     **/
    public function delete(File $file)
    {
        return view('admin.files.deleteFile', [
            'menu' => $this->litJson('menuLabo'),
            'file' => $file,
        ]);
    }

    /**
     * Supprime un fichier
     *
     * @param File $file
     * @return view
     **/
    public function destroy(File $file)
    {
        return redirect()->route('files.index')->with('message', 'fichier supprimé');
    }
}

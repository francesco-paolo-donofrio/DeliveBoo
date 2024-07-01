<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HandlesFileUpload
{
    //** Gestione caricamento file con stesso nome */
    //Devo passargli il file e il percorso
    public function uploadFile($file, $path)
    {
        //prendo nome del file
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        //prendo estensione del file
        $extension = $file->getClientOriginalExtension();

        // Genero il percorso completo del file
        $filename = $name . '.' . $extension;
        $fullPath = $path . '/' . $filename;

        // Controllo se il file esiste e aggiungo un suffisso in caso di conflitto
        $counter = 1;
        while (Storage::exists($fullPath)) {
            $filename = $name . '_' . $counter . '.' . $extension;
            $fullPath = $path . '/' . $filename;
            $counter++;
        }

        // Salvo il file con un nome non duplicato
        return Storage::putFileAs($path, $file, $filename);
    }
}
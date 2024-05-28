<?php

namespace App\Controllers;

use App\Models\SpkLampiranModel;
use ZipArchive;

class DownloadFile extends BaseController
{
    private $lampiranModel;

    public function __construct()
    {
        $this->lampiranModel = new SpkLampiranModel();
    }

    public function downloadAll($id)
    {
        $files = $this->lampiranModel->where('spk_id', $id)->findAll();

        $zip = new ZipArchive();
        $zipFileName = "order-$id.zip";

        $zipOpened = $zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        if (!$zipOpened) {
            
        }

        foreach ($files as $file) {
            $fileName = "aset/lampiran/" . $file['lampiran'];
            if (file_exists($fileName)) {
                $zip->addFile($fileName);
            }
        }
        
        $zip->close();
        
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
        readfile($zipFileName);
        
        unlink($zipFileName);
        
        exit;
    }
}
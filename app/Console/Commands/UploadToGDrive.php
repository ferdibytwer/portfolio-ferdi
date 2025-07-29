<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class UploadToGDrive extends Command
{
    protected $signature = 'gdrive:upload';
    protected $description = 'Upload backup files to Google Drive';

    public function handle()
    {
        $localDisk = Storage::disk('local');
        $gdriveDisk = Storage::disk('google');
        $date = date('Y-m-d');
        $files = $localDisk->allFiles();

        if (empty($files)) {
            $this->info('No files to upload.');
            return;
        }

        foreach ($files as $file) {
            $content = $localDisk->get($file);

            // Relatif dengan nama folder di google drive scr otomatis lewat masbug
            $pathOnDrive = "PortfolioFerdi/Back up at {$date}/" . basename($file);

            $gdriveDisk->put($pathOnDrive, $content);
            $this->info("Uploaded: $pathOnDrive");
        }
        
        $this->uploadMedia();
        // Status terakhir
        $this->info('All files uploaded to Google Drive.');
    }
    protected function uploadMedia() {
        $gdriveDisk = Storage::disk('google');
        $date = date('Y-m-d');

        $mediaPath = storage_path('app/public');
        $filesMedia = \Illuminate\Support\Facades\File::allFiles($mediaPath); // ambil semua file rekursif

        foreach ($filesMedia as $file) {
            $relativePath = str_replace($mediaPath . DIRECTORY_SEPARATOR, '', $file->getRealPath());
            $content = \Illuminate\Support\Facades\File::get($file);

            // Gunakan path relatif untuk menyimpan struktur folder di GDrive
            $pathOnDrive = "PortfolioFerdi/Back up at {$date}/media/" . basename($relativePath);

            $gdriveDisk->put($pathOnDrive, $content);
            $this->info("Uploaded media: $pathOnDrive");
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class SetupStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:storage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create necessary storage directories and then run storage:link';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up storage directories...');

        // Daftar semua direktori yang ingin Anda buat
        $directories = [
            'news/thumbnails',
            'news/gallery',
            'news/content-attachments',
            'image', // Untuk logo.png dan hero-section.png
        ];

        foreach ($directories as $dir) {
            $path = storage_path('app/public/' . $dir);

            // Periksa apakah direktori sudah ada
            if (!File::isDirectory($path)) {
                // Jika belum ada, buat direktorinya
                File::makeDirectory($path, 0755, true, true);
                $this->info("Directory created: storage/app/public/{$dir}");
            } else {
                $this->comment("Directory already exists: storage/app/public/{$dir}");
            }
        }

        // Panggil perintah storage:link yang asli
        $this->info('Running storage:link...');
        Artisan::call('storage:link');
        $this->info(Artisan::output());

        $this->info('Storage setup completed successfully.');
    }
}

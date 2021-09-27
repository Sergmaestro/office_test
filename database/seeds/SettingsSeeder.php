<?php

use App\Helpers\UnsplashHelper;
use App\Jobs\ResizeImage;
use App\Repositories\SettingsRepository;
use App\Services\FileService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SettingsSeeder extends Seeder
{
    public $eventBackgrounds = [
        'NRQV-hBF10M', 'twukN12EN7c', 't7YycgAoVSw', 'K2s_YE031CA', '4miBe6zg5r0', 'RwHv7LgeC7s',
        'PDfe7H5GJR0', 'KonWFWUaAuk','_RBcxo9AU-U', 'Ni4NgA64TFQ', 'u0ZgqJD55pE', 'HYA9Ak06qR8',
        'sR7_ImYvt1Q', 'c6SciRp2kaQ', 'wQLAGv4_OYs', 'YeUVDKZWSZ4', '1-mh6U3qeGQ', 'pVoEPpLw818',
        'KTKvnZ42QQE', 'Xaanw0s0pMk', 'vOFp-XtwHDE', 'ctRJMubyj4o', 'R0xwsuG8EsI', '1FxMET2U5dU',
        'alS7ewQ41M8', 'F573ZRbKOEw', 'pazM9TQJ2Ck', 'ebbFZvavGy4', 'wEL2zPX3jDg', 'pe_R74hldW4',
        'pe_R74hldW4', 'k9TDpGMDavs'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileNames = [];
        $unsplashHelper = app(UnsplashHelper::class);

        foreach ($this->eventBackgrounds as $image) {
            $photo = $unsplashHelper->getPhotoById($image);

            if ($photo) {
                try {
                    $contents = file_get_contents($photo->url);
                    $name = $photo->id;

                    $fileName = FileService::BACKGROUNDS_PATH . "/$name.jpg";
                    if (Storage::exists($fileName)) {
                        Storage::delete($fileName);
                    }

                    Storage::put($fileName, $contents, 'public'); // Original image

                    ResizeImage::dispatch($fileName)
                        ->onQueue(ResizeImage::RESIZE_IMAGE_QUEUE_NAME);

                    $fileNames[] = $fileName;
                } catch (Exception $e) {
                    sendErrorToLog($e, "Upload background image error");
                }
            }
        }

        SettingsRepository::saveSetting('background_images', $fileNames);
    }
}

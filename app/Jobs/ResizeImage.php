<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\Unit;
use Spatie\Image\Enums\CropPosition;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    private $w, $h, $fileName, $path;
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname ($filePath);
        $this->fileName = basename ($filePath);
        $this->w = $w;
        $this->h = $h; 
    }

    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        Image::load($srcPath)
            ->fit(Fit::Fill, 300, 300)
            ->watermark(
                base_path('resources/img/watermark.png'),
                width: 50,
                height: 50,
                paddingX: 5,
                paddingY: 5,
                paddingUnit: Unit::Percent
            )
            ->save($destPath);
    }
}


<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Queueable;

    private $ad_image_id;
    public function __construct($ad_image_id)
    {
        $this->ad_image_id = $ad_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->ad_image_id);
        if (!$i) {
            return;
        }

        $image = file_get_contents(storage_path('app/public/' . $i->path));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();

        if ($labels) {
            $result = [];
            foreach ($labels as $label) {
                $result[] = $label->getDescription();
            }

            $i->labels = $result;
            $i->save();
        }

        $imageAnnotator->close();
    }
    }


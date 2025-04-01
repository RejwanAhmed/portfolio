<?php 

use App\Models\Cv;
use App\Services\Core\BaseModelService;

class CvService
{
    public function model()
    {
        return Cv::class;
    }
}
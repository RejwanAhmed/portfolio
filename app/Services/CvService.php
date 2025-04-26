<?php 

namespace App\Services;

use App\Models\Cv;
use App\Services\Core\BaseModelService;

class CvService extends BaseModelService
{
    public function model():string
    {
        return Cv::class;
    }
}
<?php 

namespace App\Services;

use App\Models\Cv;
use App\Services\Core\BaseModelService;
use App\Services\Core\HelperService;

class CvService extends BaseModelService
{
    public function model():string
    {
        return Cv::class;
    }

    public function createCv($validatedData)
    {
        $filePath = HelperService::uploadPdf($validatedData['file'], 'uploads/cvs');
        
        if($filePath) {
            $lastCv = Cv::latest()->first();
            if($lastCv) {
                $lastCv->status = 0;
                $lastCv->save();
            }
        }

        return $this->model()::create([
            'path' => $filePath,
            'status' => 1
        ]);
    }

    public function deleteCv(Cv $cv)
    {
        HelperService::deletePdf($cv->path);
        return $this->delete($cv->id);
    }

    public function changeStatus(Cv $cv)
    {
        $activeCv = $this->model()::where('status', true)->first();
        if($activeCv) {
            $activeCv->status = false;
            $activeCv->save();
        }
        
        $status = $cv->status == true ? false : true;
        $cv->update(['status' => $status]);
        return $cv;
    }
}
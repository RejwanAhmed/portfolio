<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Http\Requests\CreateCvRequest;
use App\Models\Cv;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\CvService;
use Redirect;

class CvController extends Controller
{
    protected CvService $cvService;
    
    public function __construct(cvService $cvService)
    {
        $this->cvService = $cvService;
    }

    public function index()
    {
        $breadcrumbs = Breadcrumbs::generate('cvs');
        $cvs = $this->cvService->all();
        $responseData = [
            'cvs' => $cvs,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'CV List'
        ];
        return Inertia::render('Cv/Index', $responseData);
    }

    public function store(CreateCvRequest $request)
    {
        $validatedData = $request->validated();
        $cv = $this->cvService->createCv($validatedData);
        $status = $cv ? Constants::SUCCESS : Constants::ERROR;
        $message = $cv ? 'CV Uploaded Successfully' : 'CV could not be uploaded';
        return back()->with($status, $message);
    }

    public function destroy(Cv $cv)
    {
        
    }
}

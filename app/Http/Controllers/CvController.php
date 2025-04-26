<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCvRequest;
use App\Models\Cv;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\CvService;

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

    public function create()
    {

    }

    public function store(CreateCvRequest $request)
    {

    }

    public function destroy(Cv $cv)
    {
        
    }
}

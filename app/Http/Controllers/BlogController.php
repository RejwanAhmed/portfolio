<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\CreateToggleRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Services\BlogService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BlogController extends Controller
{
    protected BlogService $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $breadcrumbs = Breadcrumbs::generate('blogs');
        $blogs = $this->blogService->all();
        $responseData = [
            'blogs'      => $blogs,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle'  => 'Blog List',
        ];

        return Inertia::render('Blog/Index', $responseData);
    }

    public function create()
    {
        $breadcrumbs = Breadcrumbs::generate('addBlog');
        $responseData = [
            'breadcrumbs' => $breadcrumbs,
            'pageTitle'   => 'Add Blog',
        ];

        return Inertia::render('Blog/Create', $responseData);
    }

    public function store(CreateBlogRequest $request)
    {
        $validatedData = $request->validated();
        $blog = $this->blogService->create($validatedData);
        $status = $blog ? Constants::SUCCESS : Constants::ERROR;
        $message = $blog ? 'Blog created successfully' : 'Blog could not be created';

        return Redirect::route('blogs.index')->with($status, $message);
    }

    public function edit(Blog $blog)
    {
        $breadcrumbs = Breadcrumbs::generate('editBlog', $blog);
        $responseData = [
            'blog'        => $blog,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle'   => 'Edit Blog',
        ];

        return Inertia::render('Blog/Create', $responseData);
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $validatedData = $request->validated();
        $isUpdated = $this->blogService->update($blog, $validatedData);
        $status = $isUpdated ? Constants::SUCCESS : Constants::ERROR;
        $message = $isUpdated ? 'Blog updated successfully' : 'Blog could not be updated';

        return Redirect::route('blogs.index')->with($status, $message);
    }

    public function destroy(Blog $blog)
    {
        $isDeleted = $this->blogService->delete($blog->id);
        $status = $isDeleted ? Constants::SUCCESS : Constants::ERROR;
        $message = $isDeleted ? 'Blog deleted successfully' : 'Blog could not be deleted';

        return Redirect::back()->with($status, $message);
    }

    public function toggle(CreateToggleRequest $request, Blog $blog)
    {
        $validatedData = $request->validated();
        $isToggled = $this->blogService->toggle($blog, $validatedData);
        $status = $isToggled ? Constants::SUCCESS : Constants::ERROR;
        $message = $isToggled ? 'Blog updated successfully' : 'Blog could not be updated';
 
        return Redirect::back()->with($status, $message);
    }
}
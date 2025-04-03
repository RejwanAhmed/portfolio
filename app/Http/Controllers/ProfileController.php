<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Http\Requests\ProfileOtherInformationUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Services\Core\HelperService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' => User::find(1),
            'breadcrumbs' => Breadcrumbs::generate('profile'),
            'pageTitle' => 'Profile'
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateOtherInformation(ProfileOtherInformationUpdateRequest $request, User $user)
    {
        $validatedData = $request->validated();
        if (!$user->about_me_image_url) {
            $about_me_image_path = HelperService::uploadImage($validatedData['about_me_image_url'], null, 'uploads/profile');
        } else {
            $about_me_image_path = HelperService::uploadImage($validatedData['about_me_image_url'], $user->about_me_image_url, 'uploads/profile');
        }

        if (!$user->landing_image_url) {
            $landing_image_path = HelperService::uploadImage($validatedData['landing_image_url'], null, 'uploads/profile');    
        } else {
            $landing_image_path = HelperService::uploadImage($validatedData['landing_image_url'], $user->landing_image_url, 'uploads/profile');
        }
        $validatedData['about_me_image_url'] = $about_me_image_path;
        $validatedData['landing_image_url'] = $landing_image_path;
        $user = $user->update($validatedData);
        $status = $user ? Constants::SUCCESS : Constants::ERROR;
        $message = $status ? "Other Information Updated Successfully" : "Other Information Could Not Be Updated";
        return Redirect::back()->with($status, $message);
    }
}

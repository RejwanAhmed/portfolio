<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;
use App\Constants\Constants;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function send(CreateContactRequest $request)
    {
        $validatedData = $request->validated();
        $isSend = $this->contactService->sendMessage($validatedData);
        $status = $isSend ? Constants::SUCCESS : Constants::ERROR;
        $message = $status ? 'Thank you for contacting' : 'Some Error';
        return redirect()->back()->with($status, $message);
    }
}

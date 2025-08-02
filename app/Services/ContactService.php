<?php 

namespace App\Services;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Services\Core\BaseModelService;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ContactService extends BaseModelService
{
    public function model(): string 
    {
        return Contact::class;
    }

    public function sendMessage($validatedData)
    {
        $user = User::first();
        $email = $user->email;
        return Mail::to($email)->send(new ContactMail($validatedData));
    }
}
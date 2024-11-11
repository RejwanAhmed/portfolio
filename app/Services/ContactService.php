<?php 

namespace App\Services;

use App\Models\Contact;
use App\Services\Core\BaseModelService;

class ContactService extends BaseModelService
{
    public function model(): string 
    {
        return Contact::class;
    }
}
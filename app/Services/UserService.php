<?php 

namespace App\Services;

use App\Models\User;
use App\Services\Core\BaseModelService;

class UserService extends BaseModelService
{
    public function model():string
    {
        return User::class;
    }
}
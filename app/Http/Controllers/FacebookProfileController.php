<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FacebookProfileResource;

class FacebookProfileController extends Controller
{
    public function show ($id)
    {
        return new FacebookProfileResource($id);
    }
}

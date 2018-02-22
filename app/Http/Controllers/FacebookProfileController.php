<?php

namespace App\Http\Controllers;

use App\Http\Resources\FacebookProfileResource;

class FacebookProfileController extends Controller
{
    /**
     * Show the user profile info with the request id
     * @param $id
     * @return FacebookProfileResource
     */
    public function show ($id)
    {
        return new FacebookProfileResource($id);
    }
}

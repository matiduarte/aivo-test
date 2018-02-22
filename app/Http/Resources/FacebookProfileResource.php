<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Facebook\Facebook;
use Facebook\Exceptions;
use Illuminate\Support\Facades\Config;

class FacebookProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     * @throws Exceptions\FacebookSDKException
     */
    public function toArray($request)
    {
        $facebook = new Facebook([
            'app_id' => Config::get('facebook.app_id'),
            'app_secret' => Config::get('facebook.app_secret'),
            'default_graph_version' => 'v2.12',
        ]);

        try {
            //Get the access token with client_id and secret
            $api_token = json_decode(file_get_contents('https://graph.facebook.com/oauth/access_token?client_id='.$facebook->getApp()->getId().'&client_secret='.$facebook->getApp()->getSecret().'&grant_type=client_credentials'));
            //Call to Facebook API Graph with user id
            $response = $facebook->get('/'.$request->id, $api_token->access_token);
        } catch(Exceptions\FacebookResponseException $e) {
            return [
                'error' => [
                    'message' => $e->getMessage(),
                    'type' => $e->getErrorType(),
                    'code' => $e->getCode(),
                    'error_subcode' => $e->getSubErrorCode()
                ],
                'status' => $e->getHttpStatusCode()
            ];
        } catch(Exceptions\FacebookSDKException $e) {
            return [
                'error' => [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ]
            ];
        }

        return ['data' => $response->getGraphUser()->asArray(),
                'status' => $response->getHttpStatusCode()
        ];
    }


}

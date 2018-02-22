<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Facebook\Facebook;
use Facebook\Exceptions;

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

        $facebook = new Facebook();

        try {
            $response = $facebook->get('/'.$request->id, 'EAAFlRGrTYIwBAA5V3bvtJPH9GNLz8De2EE6mhL0K9AHFWTM3VhXZCelLtJzSCX7NjRC8XcL8e2NykV3fsZCs5gSMLwvZBjGzs4yDXZAX9MGKdbTfpzk8MXdF0h5s6g4SQNiuqDSwZCA1AZCxQtT2WZCH42mBMUWgPoZD');
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
                    'type' => $e->getErrorType(),
                    'code' => $e->getCode(),
                    'error_subcode' => $e->getSubErrorCode()
                ],
                'status' => $e->getHttpStatusCode()
            ];
        }

        return ['data' => $response->getGraphUser()->asArray(),
                'status' => $response->getHttpStatusCode()
        ];
    }


}

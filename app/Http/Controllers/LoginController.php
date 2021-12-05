<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;

class LoginController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $arguments = [
            'grant_type' => 'password',
            'client_id' => config('auth.proxy.client_id'),
            'client_secret' => config('auth.proxy.client_secret'),
            'scope' => '*'
        ];

        $request->request->add($arguments);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        $response = Route::dispatch($proxy);

        if ($response->getStatusCode() == 200) {
            return $this->sendSuccessResponse($response);
        }

        if ($response->getStatusCode() === 401) {
            return $response->setStatusCode(422);
        }

        return $response;
    }

    /**
     * Return a successful response for requesting an api token.
     *
     * @param \Illuminate\Http\Response $response
     * @return \Illuminate\Http\Response
     */
    public function sendSuccessResponse(Response $response)
    {
        $data = json_decode($response->getContent());

        $content = [
            'refreshToken' => $data->refresh_token,
            'expiresIn' => $data->expires_in,
        ];

        return response($content, $response->getStatusCode())
            ->cookie(
                Passport::cookie(),
                $data->access_token,
                $data->expires_in / 60,
                "",
                config('auth.cookie_domain'),
                true,
                true
            );
    }
}


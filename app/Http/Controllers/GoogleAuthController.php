<?php

namespace App\Http\Controllers;

use Google\Service\Walletobjects\PrivateUri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoogleAuthController
{
    
    public function redirectToGoogle()
    {
        $client_id = env('GOOGLE_DRIVE_CLIENT_ID');
        $redirect_uri = env('GOOGLE_DRIVE_REDIRECT_URI');

        
        $scope = 'https://www.googleapis.com/auth/drive.file'; // Bisa kamu ganti

        $auth_url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
            'client_id' => $client_id,
            'redirect_uri' => $redirect_uri,
            'response_type' => 'code',
            'scope' => $scope,
            'access_type' => 'offline', // Supaya dapat refresh_token
            'prompt' => 'consent'       // Paksa Google kasih refresh_token meski sudah pernah izinkan
        ]);

        return redirect($auth_url);
    }

    public function handleCallback(Request $request)
    {
        $client_secret = env('GOOGLE_DRIVE_CLIENT_SECRET');
        $client_id = env('GOOGLE_DRIVE_CLIENT_ID');
        $redirect_uri = env('GOOGLE_DRIVE_REDIRECT_URI');

        $code = $request->input('code');

        if (!$code) {
            return response()->json(['error' => 'Tidak ada kode dari Google']);
        }

        $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
            'code' => $code,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
            'grant_type' => 'authorization_code',
        ]);

        $token = $response->json();

        return response()->json($token);
    }   
}

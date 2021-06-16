<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class VideoService
{
    public function getVideos()
    {
        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ];

        $url = 'https://dev.horseandcountry.tv/example.json';

        try {

            $client = new \GuzzleHttp\Client(['verify' => false]);

            $response = $client->get(
                $url,
                $params
            );
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        $response = Http::acceptJson()->withOptions([
            'verify' => false,
        ])->get('https://dev.horseandcountry.tv/example.json');


        $responseString = $response->getBody()->getContents();
        $responseString = preg_replace('/,[ \n\r]*}/', '}', $responseString);

        $videosContainer = json_decode($responseString, true );

        if (isset($videosContainer['records']) && count($videosContainer['records'])) {

            $videos = [];
            foreach ($videosContainer['records'] as $record) {
                $videos[] = $record['gist'];
            }

            return $videos;
        }

        return [];
    }
}

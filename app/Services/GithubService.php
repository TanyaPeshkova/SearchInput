<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GithubService
{
    public function searchRepository($query)
    {
        $api_url = 'https://api.github.com/search/repositories';
        $response = Http::get($api_url, ['q' => $query]);

        if ($response->getStatusCode() == 200) {
            $data = $response->json();

            if ($data['total_count'] > 0) {
                return [
                    'search_url' => $api_url . '?q=' . $query,
                    'data' => $data['items'][0]
                ];
            }
        }

        return null; // Or throw an exception if needed
    }
}

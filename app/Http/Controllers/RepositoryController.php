<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use App\Models\GitRepository;
use Http;
use Illuminate\Http\Request;
use App\Services\GithubService;

class RepositoryController extends Controller
{
    protected $githubService;

    public function __construct(GithubService $githubService)
    {
        $this->githubService = $githubService;
    }

    public function index()
    {
        $repositories = Repository::all();
        return view('repositories.index', compact('repositories'));
    }

    public function search(Request $request)
    {
        $q = $request->get('query');
        $repository = Repository::where('name', 'LIKE', $q)->first();

        $api_url = 'https://api.github.com/search/repositories';

        if (!$repository) {

            $response = $this->githubService->searchRepository($q);
            if ($response) {
                $repository = $response['data'];

                $git_repository = new GitRepository();
                $git_repository->search_url = $response['search_url'];
                $git_repository->data_json = json_encode($response['data']);
                $git_repository->save();
            } else {
                return response()->json(["error" => 'Репозиторий не найден']);
            }

        } else {
            return response()->json(['error' => 'Не удалось подключиться к api GitHub'], 500);
        }


        return response()->json($repository);

    }
}

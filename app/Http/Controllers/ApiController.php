<?php



namespace App\Http\Controllers;
use App\Models\Repository;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    const items_per_page = 5;
    public function index(Request $request)
    {
        $page = $request->input('page', 1);

        $repositories = Repository::paginate(self::items_per_page, ['*'], 'page', $page);
        return response()->json($repositories);
    }
    public function find(Request $request)
    {
        $searchQuery = $request->input("query");

        $results = Repository::where('name', 'like', '%' . $searchQuery . '%')->get();
        return response()->json([
            'query' => $searchQuery,
            'results' => $results ?? [],
        ]);
    }

    public function delete(int $id)
    {
        $repository = Repository::find($id);

        if (!$repository) {
            return response()->json(['message' => 'Repository not found'], 404);
        }

        $repository->delete();

        return response()->json(['message' => 'Repository deleted successfully']);
    }

}

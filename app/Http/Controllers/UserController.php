<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $users = User::query()->paginate(10);
        return response()->json(['users' => $users]);
    }

    public function store(Request $request)
    {
        $user = User::query()->create($request->all());
        return response()->json(['user' => $user]);
    }

    public function show($id)
    {
        $user = User::query()->findOrFail($id);
        return response()->json(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id, $request->all())->update($request->all());
        return response()->json(['user' => $user]);
    }

    public function destroy($id)
    {
        User::query()->findOrFail($id)->delete();
        return response(['message' => 'OK'], 200);
    }
}

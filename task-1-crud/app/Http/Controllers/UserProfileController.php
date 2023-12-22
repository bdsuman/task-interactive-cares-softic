<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $profiles = UserProfile::all();
        return response()->json($profiles, 200);
    }

    public function store(Request $request)
    {
        $request->validate(UserProfile::rules());
        $profile = UserProfile::create($request->all());
        return response()->json($profile, 201);
    }

    public function show($id)
    {
        $profile = UserProfile::find($id);
        if (!$profile) {
            return response()->json(['error' => 'Profile not found'], 404);
        }
        return response()->json($profile, 200);
    }

    public function update(Request $request, $id)
    {
        $profile = UserProfile::find($id);
        if (!$profile) {
            return response()->json(['error' => 'Profile not found'], 404);
        }
        $request->validate(UserProfile::rules());
        $profile->update($request->all());
        return response()->json($profile, 200);
    }

    public function destroy($id)
    {
        $profile = UserProfile::find($id);
        if (!$profile) {
            return response()->json(['error' => 'Profile not found'], 404);
        }
        $profile->delete();
        return response()->json(['message' => 'Profile deleted'], 200);
    }

    // Bonus: Filter profiles by name
    public function filter($name)
    {
        $profiles = UserProfile::filterByName($name);
        return response()->json($profiles, 200);
    }
}


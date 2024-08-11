<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AdminResource;
use App\Http\Resources\DataCollection;
use App\Http\Resources\AdminCollection;
use App\Models\Divition;

class AdminController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            $currentUser = Auth::user();
            return new AdminResource($currentUser);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid username or password',
        ], 401);
    }

    public function getDivition($name)
    {
        $data = Divition::where('name', $name)->get();
        return response()->json([
            'status' => 'failed'
        ], 200);
    }
}

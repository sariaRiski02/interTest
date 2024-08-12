<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Division;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AdminResource;

use App\Http\Resources\DivisionCollection;
use App\Http\Resources\EmployeeCollection;
use App\Models\Employee;

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

    public function getDivision($name = null)
    {

        if (isset($name)) {
            $data = Division::where('name', 'like', "%$name%")->paginate(5);
        } else {
            $data = Division::paginate(5);
        }

        return new DivisionCollection($data);
    }

    public function getEmployee($param = null)
    {
        if (isset($param)) {
            $data = Employee::where('name', 'like', "%$param%")
                ->orWhere('division_id', $param)
                ->orWhereHas('division', function ($query) use ($param) {
                    $query->where('divisions.name', 'like', "%$param%");
                })
                ->paginate(5);
        } else {
            $data = Employee::paginate(5);
        }
        return new EmployeeCollection($data);
    }

    public function createEmployee(EmployeeRequest $request)
    {
        $data = $request->validated();

        $employee = Employee::create([
            'image' => isset($data['image']) ? $data['image'] : null,
            'name' => $data['name'],
            'division_id' => $data['division'],
            'phone' => $data['phone'],
            'position' => $data['position'],
        ]);

        if (!$employee) {
            return response()->json([
                "status" => "error",
                "message" => "Create Data failed"
            ]);
        }
        return response()->json([
            "status" => "success",
            "message" => "Created Success"
        ]);
    }

    public function updateEmployee(EmployeeRequest $request, $id)
    {
        $validated = $request->validated();
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                "status" => "error",
                "message" => "id not found"
            ]);
        }
        $data = $employee->update($validated);

        if (!$data) {
            return response()->json([
                "status" => "error",
                "message" => "Create Data failed"
            ]);
        }

        return response()->json([
            "status" => "success",
            "message" => "Updated Success"
        ]);
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                "status" => "error",
                "message" => "id not found"
            ]);
        }

        return response()->json([
            "status" => "success",
            "message" => "Deleted success"
        ]);
    }

    public function logout() {}
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Mentor;
use Validator;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mentors = Mentor::with('user')->paginate(10);
    
        return response()->json([
            'success' => true,
            'message' => 'Mentores cargados correctamente',
            'data' => $mentors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mentor = Mentor::with('user')->find($id);

        if($mentor==null) {
            $response = [
                'success' => false,
                'message' => "mentor no trobat",
                'data' => [],
            ];

            return response()->json($response,404);
        }
        
        $response = [
                'success' => true,
                'message' => "mentor trobat",
                'data' => $mentor,
            ];

        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

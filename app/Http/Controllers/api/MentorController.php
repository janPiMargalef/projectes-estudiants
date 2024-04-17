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
        $user = auth()->user(); // Obtiene el usuario autenticado
        $mentors = Mentor::with('user')->paginate(10);
    
        // Comprueba si cada mentor está guardado por el usuario
        $mentors->getCollection()->transform(function ($mentor) use ($user) {
            $mentor->isSaved = $user ? $user->mentors()->where('mentor_id', $mentor->id)->exists() : false;
            return $mentor;
        });
    
        return response()->json([
            'success' => true,
            'message' => 'Mentores cargados correctamente',
            'data' => $mentors,
        ]);
    }

    public function saveOrUnsaveMentor($mentorId)
{
    $user = auth()->user();  // Obtiene el usuario autenticado
    $mentor = Mentor::findOrFail($mentorId);  // Encuentra el mentor o falla si no existe

    // Alternar el estado de guardado del mentor
    $user->mentors()->toggle($mentorId);

    // Comprobar si el mentor está actualmente guardado después del toggle
    $isSaved = $user->mentors()->where('mentor_id', $mentorId)->exists();

    return response()->json([
        'message' => $isSaved ? 'Mentor guardado exitosamente.' : 'Mentor desguardado exitosamente.',
        'isSaved' => $isSaved  // Devuelve el nuevo estado de "guardado"
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

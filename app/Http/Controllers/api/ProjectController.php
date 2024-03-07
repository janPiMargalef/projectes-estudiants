<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Project;
use App\Models\User;
use Validator;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ordenats per ordre d'inserció
        $userId = Auth::id();
        $projects = Project::latest()->paginate(2);

        $response = [
            'success' => true,
            'message' => "Llistat projectes recuperat",
            'data' => $projects,
        ];

        //return $response;
        return response()->json($response,200);
    }


    public function showUserProjects()
    {
        $user = Auth::user();
    
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 403);
        }
    
        $projects = $user->projects()->take(2)->get(['logo']); // Obtener los dos primeros proyectos
        $totalProjects = $user->projects()->count(); // Contar todos los proyectos del usuario
    
        return response()->json([
            'success' => true,
            'logos' => $projects,
            'totalProjects' => $totalProjects,
        ]);
    }


    public function userProjects()
{
    if (!Auth::check()) {
        return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 403);
    }

    $user = Auth::user();
    $projectsSaved = $user->projectsUsers()->paginate(4);

    return response()->json([
        'success' => true,
        'projects' => $projectsSaved,
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
        // Validar campos
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required|min:3|max:10',
            'company' => 'required',
            'sector' => 'required',
            'description' => 'required',
            'budget' => 'required',
            'date' => 'required',
        ]);
    
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => "Errores de validación",
                'data' => $validator->errors()->all(),
            ];
    
            return response()->json($response, 400);
        }
        
        // Comprobar si el usuario está autenticado
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => "Usuario no autenticado.",
            ], 403); // Código 403 Forbidden si no hay usuario autenticado
        }
    
        // Añadir el user_id al array de entrada
        $input['user_id'] = Auth::id(); // Obtiene el ID del usuario autenticado
        
        // Crear el proyecto
        $project = Project::create($input);
    
        $response = [
            'success' => true,
            'message' => "Proyecto creado correctamente",
            'data' => $project,
        ];
    
        return response()->json($response, 200);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

          $project = Project::find($id);

          if($project==null) {
              $response = [
                  'success' => false,
                  'message' => "Projecte no trobat",
                  'data' => [],
              ];

              return response()->json($response,404);
          }
          
          $response = [
                  'success' => true,
                  'message' => "Projecte trobat",
                  'data' => $project,
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
        $project = Project::find($id);

        if($project==null) {
            $response = [
                'success' => false,
                'message' => "Projecte no trobat",
                'data' => [],
            ];  

            return response()->json($response,404);
        }   

        $input = $request->all();
        $validator = Validator::make($input,
        [ 
            'title'=>'required|min:3|max:10',
            'logo'=>'required',
            'company'=>'required',
            'sector'=>'required',
            'description'=>'required',
            'budget'=>'required',
            'date'=>'required',
            'user_id'=>'required',

        ]
        );

        if($validator->fails()) {
            $response = [
                'success' => false,
                'message' => "Errors de validació",
                'data' => $validator->errors()->all(),
            ];
            
            return response()->json($response,400);
        }

        $project->update($input);
        $response = [
                'success' => true,
                'message' => "Projecte actualitzat correctament",
                'data' => $project,
        ];

        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

         $project = Project::find($id);

         if($project==null) {
             $response = [
                 'success' => false,
                 'message' => "Projecte no trobat",
                 'data' => [],
             ];

             return response()->json($response,404);
         }

         try {
             $project->delete();
             $response = [
                     'success' => true,
                     'message' => "Projecte esborrat",
                     'data' => $planet,
                 ];

             return response()->json($response,200);
         }
         catch(\Exception $e) {
             $response = [
                     'success' => false,
                     'message' => "Error esborrant projecte",                    
                 ];

             return response()->json($response,400);
                }
    }
}

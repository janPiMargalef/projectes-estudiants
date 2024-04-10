<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectInvitation;
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


    public function removeInteraction($projectId)
    {
        $user = Auth::user();
    
        // Eliminar cualquier interacción con el proyecto
        $user->projectsUsers()->detach($projectId);
    
        return response()->json([
            'success' => true,
            'message' => 'Interacción eliminada correctamente.',
        ]);
    }
    

    //interact with project (like, save...)
    public function interact(Request $request, Project $project)
{
    $user = Auth::user();
    $type = $request->type; 

    $interaction = $project->users()->syncWithoutDetaching([$user->id => ['type' => $type]]);

    return response()->json([
        'success' => true,
        'message' => 'Interacción guardada correctamente.',
    ]);
}

    public function userInfo()
    {
        // ordenats per ordre d'inserció
        $user = Auth::user();
        $userInfo = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $user->image, 
            'occupation' => $user->occupation, 
        ];

        $response = [
            'success' => true,
            'message' => "Info d'usuari recuperada",
            'data' => $userInfo,
        ];

        //return $response;
        return response()->json($response,200);
    }


    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // 2MB max
        ]);

        $user = Auth::user();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Crear un nombre único

            // Guardar la imagen en public/images/profile-images
            $path = $file->move(public_path('images/profile-images'), $filename);

            // Actualizar la ruta de la imagen en la base de datos
            $user->image = 'images/profile-images/' . $filename;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Imagen actualizada correctamente', 'path' => $user->image]);
        }

        return response()->json(['success' => false, 'message' => 'No se pudo actualizar la imagen']);
    }

    public function showUserProjects()
    {
        $user = Auth::user();
    
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 403);
        }
    
        $projects = $user->projects()->latest()->take(2)->get(['logo']);
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

    //metodo obtenir projectes de l'usuari connectat
    public function createdProjects()
{
    // Comprobar si el usuario está autenticado
    if (!Auth::check()) {
        return response()->json(['error' => 'Usuario no autenticado'], 401);
    }

    $user = Auth::user(); 
    $projects = $user->projects()->with('user')->paginate(2);

    // Devolver los proyectos con una respuesta JSON
    return response()->json([
        'success' => true,
        'projects' => $projects
    ]);
}



public function sendInvitation(Request $request)
{
    $projectId = $request->projectId; 
    $inviteeEmail = $request->inviteeEmail;
    $user = User::where('email', $inviteeEmail)->first();

    // Aquí, obtén la información necesaria sobre el proyecto
    $project = Project::find($projectId);

    if (!$user) {
        // Si no existe un usuario con ese email, devuelve un mensaje de error
        return back()->with('error', 'No existe un usuario con ese correo electrónico.');
    }

    if ($project) {
        // Envía el correo de invitación solo si el usuario existe
        Mail::to($inviteeEmail)->send(new ProjectInvitation($project->title, auth()->user()->name, $projectId, $user->id));
        return back()->with('success', 'Invitación enviada correctamente.');
    }

 return back()->with('error', 'No se pudo enviar la invitación.');
}


public function acceptInvitation($projectId, $userId)
{

    // Redirigir o devolver una vista indicando que el usuario ha sido añadido al proyecto con éxito
}

}







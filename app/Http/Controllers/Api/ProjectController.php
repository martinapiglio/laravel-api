<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request) {

        $projects = Project::with('type', 'technologies')->orderBy('projects.created_at', 'desc')->paginate(6);
        $types = Type::all();

        $formData = $request->all();
        
        if($request->has('type_id') && $formData['type_id'] != "") {

            $projects = Project::where('type_id', $formData['type_id'])
                                ->with('type', 'technologies')
                                ->orderBy('projects.created_at', 'desc')
                                ->paginate(4);

            if(count($projects) == 0) {
                return response()->json([
                    'success' => false,
                    'error' => 'No projects found in this category',
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'results' => $projects,
            'types' => $types,
        ]);

    }

    public function show($slug) {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        if($project) {

            return response()->json([
                'success' => true,
                'project' => $project,
            ]);

        } else {

            return response()->json([
                'success' => false,
                'error' => 'Selected project does not exist',
            ]);

        }

    }
}

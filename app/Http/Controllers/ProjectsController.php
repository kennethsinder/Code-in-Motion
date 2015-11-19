<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'delete']]);
    }

    public function index()
    {
        $projects = Project::latest('date_created')->get();
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $path = null;
        $extensions = ['bmp', 'gif', 'jpg', 'png'];
        foreach ($extensions as $ext) {
            $potentialPath = 'images/catalog/projects' . $project->id . '.' . $ext;
            if (file_exists($potentialPath)) {
                $path = $potentialPath;
                break;
            }
        }
        return view('projects.show', compact('project', 'path'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    public function update(Project $project, ProjectRequest $request)
    {
        $project->update([
            'id' => $request->get('id'),
            'name' => $request->get('name'),
            'excerpt' => $request->get('excerpt'),
            'description' => $request->get('description'),
            'github' => $request->get('github'),
            'date_created' => $request->get('date_created'),
        ]);

        $this->saveImage($project, $request);
        return redirect("projects/$project->id");
    }

    public function store(ProjectRequest $request)
    {
        $project = new Project([
            'id' => $request->get('id'),
            'name' => $request->get('name'),
            'excerpt' => $request->get('excerpt'),
            'description' => $request->get('description'),
            'github' => $request->get('github'),
            'date_created' => $request->get('date_created'),
        ]);
        $this->saveImage($project, $request);
        $project->save();
        return redirect('projects')->with([
            'flash_message' => 'Your project has been created.'
        ]);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('projects')->with(['flash_message' => 'Your project has been deleted.']);
    }

    private function saveImage(Project $project, ProjectRequest $request)
    {
        if ($request->file('image')) {
            $imageName = $project->id . '.' . $request->file('image')->getClientOriginalExtension();
            $newExt = 'images/catalog/projects' . $imageName;
            $img = Image::make($request->file('image'))->orientate()->heighten(300);
            $img->save(public_path($newExt));

        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Validation\Rule;
use App\Comment;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except'=>['show']
        ]);
    }
    public function show_by_user(User $user)
    {
        $projects = $user->projects()
            ->paginate(30);
        return view('projects.show_by_user', compact('user', 'projects'));
    }

    public function show(Project $project)
    {
        $post = Post::where('project_id', $project->id)
                ->where('post_type', 'introduction')
                ->get();
        $post = $post[0];
        $comments = Comment::where('parent_id', $post->id)
                    ->where('parent_type', 'App\Post')
                    ->get();
        $creator = User::where('id', $project->creator_id)
                    ->get();
        $creator = $creator[0];
        //$comments = $post->comments();
        return view('projects.show', compact('project', 'post', 'comments', 'creator'));
    }
    public function create()
    {
        return view('projects.create');
    }
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'project_name' => ['required|max:50', Rule::unique('projects')->where(function ($query) {
//                return $query->where('creator_id', Auth::user()->id);
//            })],
//            'content_md' => 'required',
//            'release_status' => ['required', Rule::in(['released', 'developing'])],
//            'visibility' => ['required', Rule::in(['public', 'draft'])],
//            'template_id' => ['required', Rule::in(['1'])],
//        ]);
        $project = Auth::user()->projects()->create([
            'name' => $request->project_name,

            'visibility' => $request->visibility,
            'template_id' => $request->template_id,
            'created_at' => now(),
            'updated_at' => now(),
            'creator_id' => Auth::user()->id,
        ]);

//        $this->validate($request, [
//            'product_name' => 'required|unique:products',
//            'product_introduction' => 'required|max:100',
//            'cover' => 'image',
//            'classification' => ['required', Rule::in(['game', 'music', 'picture', 'tool'])],
//            'files' => 'file',
//        ]);

        $product = $project->product()->create([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => $request->product_name,
            'introduction' => $request->product_introduction,
            'cover' => '#',
            'classification' => $request->classification,
            'files' => '#',
            'tag_list' => '#',
            'release_status' => $request->release_status,
        ]);

        $post = $project->posts()->create([
            'created_at' => now(),
            'updated_at' => now(),
            'title' => $request->project_name.'_post',
            'content_md' => $request->content_md,
            'creator_id' => Auth::user()->id,
            'post_type' => 'introduction',
            'project_id' => $project->id,

        ]);
        $project->post_id = $post->id;
        $project->save();

        session()->flash('success', '创建项目成功！');

        return redirect()->route('projects.show', [$project]);
    }
    public function destroy(Project $project)
    {
        $this->authorize('belong', $project);
        $product = Product::find($project->id);
//        $post = Post::where('id', $project->post_id)
//                ->get();
//        $post = $post[0];
//        $product->delete();
        $project->delete();
        return redirect()->route('users.projects', Auth::user());
    }

    public function edit(Project $project)
    {
        $this->authorize('belong', $project);

        $product = Product::find($project->id);
        return view('projects.edit', compact('project','product'));
    }

    public function update(Project $project, Request $request)
    {
        $this->authorize('belong', $project);

        $project->update($request);


    }
}

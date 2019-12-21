<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //
    public function index()
    {
        $test = 1;
        return view('comments.index', compact('test'));
    }
    public function store(Request $request)
    {
        //return 'here';

        if($request->parent_type == "App\Post")
        {
            $parent = Post::where('id', $request->parent_id)
                ->get();
            $parent = $parent[0];
        }
        else
        {
            $parent = Comment::where('id', $request->parent_id)
                ->get();
            $parent = $parent[0];
        }
        $comment = $parent->child_comments()->create([
            'created_at' => now(),
            'updated_at' => now(),
            'content_md' => $request->content_md,
            'parent_type' => $request->parent_type,
            'level' => $request->level,
            'parent_id' => $request->parent_id,
            'creator_id' => Auth::user()->id,
        ]);


        $project = Project::where('id', $request->project_id)
                    ->get();
        $project = $project[0];
        //return view('projects.show', compact('project'));
        return redirect()->route('projects.show', $project);
    }
    public function destroy(Comment $comment)
    {
        if(Auth::user()->id == $comment->creator_id)
        {
            $comment->update([
               'deleted'=>true,
            ]);
        }
        return redirect()->back();
    }


}

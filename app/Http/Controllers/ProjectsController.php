<?php

namespace App\Http\Controllers;

use App\Handlers\FileUploadHandler;
use App\Handlers\ImageUploadHandler;
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

        $render_game = false;
        $render_music = false;
        $render_picture = false;
        $render_tool = false;
        foreach ($projects as $project)
        {
            if($project->product()->get()[0]->classification == 'game')
            {
                $render_game = true;
            }

            if($project->product()->get()[0]->classification == 'music')
            {
                $render_music = true;
            }

            if($project->product()->get()[0]->classification == 'picture')
            {
                $render_picture = true;
            }

            if($project->product()->get()[0]->classification == 'tool')
            {
                $render_tool = true;
            }
            if($render_game && $render_music &&$render_picture && $render_tool) break;
        }


        return view('projects.show_by_user', compact('user', 'projects', 'render_tool', 'render_picture', 'render_music', 'render_game'));
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
        $product = $project->product()->get()[0];
        //$comments = $post->comments();
        return view('projects.show', compact( 'product','project', 'post', 'comments', 'creator'));
    }
    public function create()
    {
        return view('projects.create');
    }
    public function store(Request $request)
    {

        //dd($request->files);
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


//        var_dump($img_location);
//        dd($img_location);
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
            'cover' => "img/default_img.jpg",
            'classification' => $request->classification,
            'files' => '#',
            'tag_list' => '#',
            'release_status' => $request->release_status,
        ]);


        if($request->cover != null)
        {
            $img_handler = new ImageUploadHandler();
            $img_location = $img_handler->save($request->cover, "products/".$product->id, 'cover');
            $product->update([
                'cover' => $img_location['path'],
            ]);
        }
        if($request->files->get('files') != null)
        {

            $file_handler = new FileUploadHandler();
            $file_location = $file_handler->save($request->files->get('files'), "products/".$product->id, "files");
            $product->update([
                'files' => $file_location['path'],
            ]);

        }



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

        return redirect()->route('projects.show_by_user', Auth::user());
    }


    protected function deldir($dir) {
        //先删除目录下的文件：
        $dh = opendir($dir);
        while ($file = readdir($dh)) {
            if($file != "." && $file!="..") {
                $fullpath = $dir."/".$file;
                if(!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    $this->deldir($fullpath);
                }
            }
        }
        closedir($dh);

        //删除当前文件夹：
        if(rmdir($dir)) {
            return true;
        } else {
            return false;
        }
    }

    public function destroy(Project $project)
    {
        $this->authorize('belong', $project);
        $product = Product::find($project->id);
//        $post = Post::where('id', $project->post_id)
//                ->get();
//        $post = $post[0];
//        $product->delete();

        if($product->cover != "img/default.jpg")
        {
            $cover = $_SERVER['DOCUMENT_ROOT'].'uploads/images/products/'.$product->id;
            $this->deldir($cover);
        }
        if($product->files != '#')
        {
            $files = $_SERVER['DOCUMENT_ROOT'].'uploads/files/products/'.$product->id;
            $this->deldir($files);
        }


        $project->delete();



        return redirect()->route('projects.show_by_user', Auth::user());
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

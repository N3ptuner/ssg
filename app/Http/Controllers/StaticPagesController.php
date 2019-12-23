<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\DB;

class StaticPagesController extends Controller
{
    public function game()
    {
        if(isset($_GET['tags_selected']))
        {

            $tags_selected = array_filter(explode(";",$_GET['tags_selected']));
            $tags_remain = array_filter(explode(";",$_GET['tags_remain']));

            sort($tags_selected);
//            dd($tags_selected);
            sort($tags_remain);

            $games = Product::where('classification', 'game')
                ->where('release_status', 'released')
                ->get();
//            dd($games);
//            foreach ($games as $game)
//            {
//
//            }
//            dd($games);

            $games_after = [];
            foreach ($games as $game)
            {
                $success = true;
                foreach ($tags_selected as $tag)
                {
                    //echo strstr($game->tag_list, $tag);

                    if(strstr($game->tag_list, $tag) == false)
                    {
                        $success = false;
                        break;
                    }
                }
                if($success)
                {
                    $games_after[] = $game;
                }
            }
            $games = collect($games_after);
        }
        else
        {
//          $tags = Tag::all();
            $tags_selected = [];
            $tags_remain = [1,2,3];
            $games = Product::where('classification', 'game')
                ->where('release_status', 'released')
                ->get();
           //dd($games);
        }
        $product_type = 'game';

        return view('staticpages.game', compact('tags_remain', 'tags_selected','product_type', 'games'));
    }
    public function music()
    {

        if(isset($_GET['tags_selected']))
        {

            $tags_selected = array_filter(explode(";",$_GET['tags_selected']));
            $tags_remain = array_filter(explode(";",$_GET['tags_remain']));

            sort($tags_selected);
            sort($tags_remain);

            $musics = Product::where('classification', 'music')
                ->where('release_status', 'released')
                ->get();
            $musics_after=[];
            foreach ($musics as $music)
            {
                $success = true;
                foreach ($tags_selected as $tag)
                {
                    //echo strstr($game->tag_list, $tag);

                    if(strstr($music->tag_list, $tag) == false)
                    {
                        $success = false;
                        break;
                    }
                }
                if($success)
                {
                    $musics_after[] = $music;
                }
            }
            $musics = collect($musics_after);
        }
        else
        {
//          $tags = Tag::all();
            $tags_selected = [];
            $tags_remain = [1,2,3];
            $musics = Product::where('classification', 'music')
                ->where('release_status', 'released')
                ->get();
            //dd($games);
        }
        $product_type = 'music';
        return view('staticpages.music', compact('tags_selected',"tags_remain",'product_type','musics'));
    }
    public function picture()
    {
        if(isset($_GET['tags_selected']))
        {

            $tags_selected = array_filter(explode(";",$_GET['tags_selected']));
            $tags_remain = array_filter(explode(";",$_GET['tags_remain']));

            sort($tags_selected);
            sort($tags_remain);

            $pictures = Product::where('classification', 'music')
                ->where('release_status', 'released')
                ->get();
            $pictures_after=[];
            foreach ($pictures as $picture)
            {
                $success = true;
                foreach ($tags_selected as $tag)
                {
                    //echo strstr($game->tag_list, $tag);

                    if(strstr($picture->tag_list, $tag) == false)
                    {
                        $success = false;
                        break;
                    }
                }
                if($success)
                {
                    $pictures_after[] = $picture;
                }
            }
            $pictures = collect($pictures_after);
        }
        else
        {
//          $tags = Tag::all();
            $tags_selected = [];
            $tags_remain = [1,2,3];
            $pictures = Product::where('classification', 'picture')
                ->where('release_status', 'released')
                ->get();
            //dd($games);
        }
        $product_type = 'picture';
        return view('staticpages.picture', compact('tags_selected','tags_remain','product_type','pictures'));
    }
    public function tool()
    {
        if(isset($_GET['tags_selected']))
        {

            $tags_selected = array_filter(explode(";",$_GET['tags_selected']));
            $tags_remain = array_filter(explode(";",$_GET['tags_remain']));

            sort($tags_selected);
            sort($tags_remain);

            $tools = Product::where('classification', 'tool')
                ->where('release_status', 'released')
                ->get();
            $tools_after=[];
            foreach ($tools as $tool)
            {
                $success = true;
                foreach ($tags_selected as $tag)
                {
                    //echo strstr($game->tag_list, $tag);

                    if(strstr($tool->tag_list, $tag) == false)
                    {
                        $success = false;
                        break;
                    }
                }
                if($success)
                {
                    $tools_after[] = $tool;
                }
            }
            $tools = collect($tools_after);
        }
        else
        {
//          $tags = Tag::all();
            $tags_selected = [];
            $tags_remain = [1,2,3];
            $tools = Product::where('classification', 'tool')
                ->where('release_status', 'released')
                ->get();
            //dd($games);
        }
        $product_type = 'tool';
        return view('staticpages.tool', compact('tags_selected','tags_remain','product_type','tools'));
    }

    public function home()
    {
        $games = Product::where('classification', 'game')
                    ->where('release_status', 'released')
                    ->take(10)
                    ->get();
        $musics = Product::where('classification', 'music')
                    ->where('release_status', 'released')
                    ->take(10)
                    ->get();
        $pictures = Product::where('classification', 'picture')
                    ->where('release_status', 'released')
                    ->take(10)
                    ->get();
        $tools = Product::where('classification', 'tool')
                    ->where('release_status', 'released')
                    ->take(10)
                    ->get();



        return view('staticpages.home', compact('tags','games', 'musics', 'pictures', 'tools'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function game()
    {
        $games = Product::where('classification', 'game')
            ->where('release_status', 'released')
            ->take(10)
            ->get();
        return view('staticpages.game', compact('games'));
    }
    public function music()
    {
        $musics = Product::where('classification', 'music')
            ->where('release_status', 'released')
            ->take(10)
            ->get();
        return view('staticpages.music', compact('musics'));
    }
    public function picture()
    {
        $pictures = Product::where('classification', 'picture')
            ->where('release_status', 'released')
            ->take(10)
            ->get();
        return view('staticpages.picture', compact('pictures'));
    }
    public function tool()
    {
        $tools = Product::where('classification', 'tool')
            ->where('release_status', 'released')
            ->take(10)
            ->get();
        return view('staticpages.tool', compact('tools'));
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

        return view('staticpages.home', compact('games', 'musics', 'pictures', 'tools'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Mvim;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->sideBar();
        $mvims = Mvim::where('sh', 1)->get();
        $news = News::where('sh', 1)->get()->filter(function ($val, $idx) {
            if ($idx > 4) {
                $this->view['more'] = '/news';
                return $idx;
            } else {
                return $val;
            }
        });
        $this->view['mvims'] = $mvims;
        $this->view['news'] = $news;
        return view('main', $this->view);
    }

    protected function sideBar()
    {
        $ads = implode('  ', Ad::where('sh', 1)->get()->pluck('text')->all());
        $menus = Menu::where('sh', 1)->get();
        $images = Image::where('sh', 1)->get();
        foreach ($menus as $key => $menu) {
            $subs = $menu->subs;
            $menu->subs = $subs;
            $menus[$key] = $menu;
        }

        if (Auth::user()) {
            $this->view['user'] = Auth::user();
        }

        $this->view['ads'] = $ads;
        $this->view['menus'] = $menus;
        $this->view['images'] = $images;
    }
}
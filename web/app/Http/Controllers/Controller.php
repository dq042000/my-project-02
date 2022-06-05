<?php

namespace App\Http\Controllers;

use App\Models\Bottom;
use App\Models\Title;
use App\Models\Total;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view = [];

    public function __construct()
    {
        $this->view['title'] = Title::where('sh', 1)->first();
        $this->view['total'] = Total::first()->total;
        if (!session()->has('visiter')) {
            $total = Total::first();
            $total->total++;
            $total->save();
            $this->view['total'] = $total->total;

            // 二種session寫法
            // session(['visiter' => $total->total]);
            session()->put('visiter', $total->total);
        }
        $this->view['bottom'] = Bottom::first()->bottom;
    }
}
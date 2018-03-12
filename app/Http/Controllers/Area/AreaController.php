<?php

namespace App\Http\Controllers\Area;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function __construct()
    {

    }

    public function getArea()
    {
        $file = 'file/data/area.txt';
        $area = file($file);
        foreach ($area as $k=>$v) {
           dd($area);
        }
    }
}

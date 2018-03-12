<?php

namespace App\Http\Controllers;

use App\Libraries\Model\Intro\Intro;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class BaseController extends Controller
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     * @param Intro $intro
     */
    private $intro;
    public function __construct(Intro $intro)
    {
        $this->intro = $intro;
    }

    /**
     * @return mixed
     */
    public function Intro()
    {
        return $this->intro->getBlogIntro();
    }

}

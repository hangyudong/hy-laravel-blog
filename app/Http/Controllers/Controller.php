<?php

namespace App\Http\Controllers;

use App\Libraries\Model\Intro\Intro;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
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

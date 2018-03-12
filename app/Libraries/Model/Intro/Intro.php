<?php

namespace App\Libraries\Model\Intro;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    //
    public function getBlogIntro()
    {
        return $this->first();
    }
}

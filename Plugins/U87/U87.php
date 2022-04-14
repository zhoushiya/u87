<?php

namespace App\Plugins\U87;

/**
 * @name U87
 * @package U87模板
 * @version 1.0.0
 * @author 龙城男人
 * @link https://U87.cc
 */
class U87
{
	public function handler(): void
	{
	    $this->boot();
	    $this->helpers();
	}
	
    public function helpers(): void
	{
        require_once __DIR__."/helpers.php";
    }

    public function boot()
	{
        require_once __DIR__."/bootstrap.php";
    }
}
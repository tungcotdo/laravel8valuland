<?php

namespace App\Widgets;

use App\Library\Funcs;
use App\Models\Users;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class Header extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    protected $user = [];
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */

    public function run()
    {
        $route = Route::current()->getName();
        return view('widgets.header', [
            'config' => $this->config,
        ]);
    }
}

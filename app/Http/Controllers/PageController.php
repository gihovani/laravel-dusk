<?php

namespace App\Http\Controllers;

use App\Page;

class PageController extends Controller
{
    use CrudControllerTrait;

    public function __construct(Page $page)
    {
        $this->model = $page;
        $this->path = 'pages';
        $this->redirectPath = '/pages';
    }
}

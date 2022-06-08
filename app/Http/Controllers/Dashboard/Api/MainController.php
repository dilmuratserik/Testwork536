<?php

namespace App\Http\Controllers\Dashboard\Api;

use App\Http\Controllers\Dashboard\BaseController;

/**
 * Class MainController
 *
 * @package App\Http\Controllers\Dashboard\Api
 */
class MainController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.api.index');
    }
}

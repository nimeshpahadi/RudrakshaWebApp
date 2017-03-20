<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/13/17
 * Time: 1:10 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin');
    }
}
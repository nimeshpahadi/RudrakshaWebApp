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

    }

    public function getAdmin()
    {
        return view('admin/login');
    }

    public function index()
    {
        return "hello world";
    }
}
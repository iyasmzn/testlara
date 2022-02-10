<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        $this->model = new Category();
    }
    public function index()
    {
        return $this->model->paginate(5);
    }
}

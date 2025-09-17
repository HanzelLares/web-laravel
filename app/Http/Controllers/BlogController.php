<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show(Blog $blog)
    {
        // Lógica para mostrar un blog específico
        return view('blogs.show', compact('blog'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home',[
            'title' => 'Home',
        ]);
    }
    public function about()
    {
        return Inertia::render('About/About',[
            'title' => 'About',
        ]);
    }
    public function contacts()
    {
        return Inertia::render('Contacts/Contacts',[
            'title' => 'Contacts',
        ]);
    }
}

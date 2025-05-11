<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\OurPartner;
use App\Models\OurPortofolio;
use App\Models\OurProject;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'gallery' => Gallery::count(),
            'porto' => OurPortofolio::count(),
            'project' => OurProject::count(),
            'partner' => OurPartner::count(),
        ]);
    }
}

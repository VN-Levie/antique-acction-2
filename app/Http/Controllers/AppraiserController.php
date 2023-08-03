<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Appraiser;


class AppraiserController extends Controller
{
    public function index()
    {
        $per_page = 6;
        $DataTeam = Appraiser::paginate($per_page);
        return Inertia::render('Home/Appraiser/Index', ['DataTeam' => $DataTeam]);
    }
}

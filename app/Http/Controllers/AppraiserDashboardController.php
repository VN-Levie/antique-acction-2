<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Appraiser;


use Illuminate\Http\Request;

class AppraiserDashboardController extends Controller
{
    public function index($search = null)
    {
        $per_page = 10;

        $query = Appraiser::query();

        if ($search) {
            $query->where('biography', 'LIKE', "%$search%")
                ->orWhere('name', 'LIKE', "%$search%")
                ->orWhere('titles', 'LIKE', "%$search%");
        }
        $appraiserdata = $query->paginate($per_page);

        return Inertia::render('Dashboard/Appraiser/Index', ['appraiserdata' => $appraiserdata]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        $DataTeam = DB::table('appraisers')->get();
        return response()->json($DataTeam);
    }
}

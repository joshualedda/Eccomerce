<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB; // Correct import statement
use App\Models\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getStudentCount()
    {
        $data = Chart::select('campus', DB::raw('count(*) as total_students'))
            ->groupBy('campus')
            ->get();

        $campusCounts = [
            'NLUC' => 0,
            'MLUC' => 0,
            'SLUC' => 0,
        ];

        foreach ($data as $row) {
            $campusCounts[$row->campus] = $row->total_students;
        }

        $yValues = array_values($campusCounts);

        return response()->json(['yValues' => $yValues]);
    }
}

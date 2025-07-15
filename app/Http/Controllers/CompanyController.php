<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        try {
            $companies = Company::with(['tasks.user'])
            ->when($request->search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })->get();

            return response()->json([
                'data' => $companies,
                'message' => 'Companies retrieved successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to retrieve companies',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

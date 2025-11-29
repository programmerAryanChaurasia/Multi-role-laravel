<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\ShortUrl;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  
    public function index()
    {
        $user = auth()->user();
        
        // Get data based on user role
        if ($user->isSuperAdmin()) {
            $data = [
                'totalCompanies' => Company::count(),
                'totalUsers' => User::count(),
                'totalShortUrls' => ShortUrl::count(),
                'recentUrls' => ShortUrl::with(['user', 'company'])->latest()->take(5)->get()
            ];
        } elseif ($user->isAdmin()) {
            $data = [
                'companyUsers' => User::where('company_id', $user->company_id)->count(),
                'companyShortUrls' => ShortUrl::where('company_id', $user->company_id)->count(),
                'recentUrls' => ShortUrl::where('company_id', $user->company_id)->latest()->take(5)->get()
            ];
        } else {
            $data = [
                'myShortUrls' => $user->shortUrls()->count(),
                'recentUrls' => $user->shortUrls()->latest()->take(5)->get()
            ];
        }

        return view('dashboard', $data);
    }
}
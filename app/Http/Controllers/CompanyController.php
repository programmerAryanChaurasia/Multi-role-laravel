<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invitation;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
   
    public function index()
    {
        $companies = Company::withCount(['users', 'shortUrls'])->latest()->get();
        return view('companies.index', compact('companies'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:companies',
            'founder_email' => 'required|email|unique:users,email',
        ]);

        // Create the company
        $company = Company::create([
            'name' => $request->name,
        ]);

        $token = Str::random(32);

        $invitation = Invitation::create([
            'email' => $request->founder_email,
            'token' => $token,
            'role' => 'admin', // Founder becomes admin
            'company_id' => $company->id,
            'invited_by' => auth()->id(),
        ]);

       
        // Send invitation email with detailed error handling
        try {
            
            Mail::to($request->founder_email)->send(new InvitationMail($invitation));            
            return redirect()->route('companies.index')->with('success', 'Company created and invitation sent to founder successfully!');
            
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
            \Log::error('Exception details: ', ['exception' => $e]);
            
            // If email fails, still create company but show warning with error details
            return redirect()->route('companies.index')->with('error_details', 'Please check your email configuration.');
        }
    }

   
    public function show(Company $company)
    {
        $company->load(['users', 'shortUrls.user']);
        return view('companies.show', compact('company'));
    }
}
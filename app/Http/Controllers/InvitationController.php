<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    /**
     * Send invitation (SuperAdmin - for any company)
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'company_id' => 'required|exists:companies,id',
            'role' => 'required|in:admin,member',
        ]);

        // Check if invitation already exists
        $existingInvitation = Invitation::where('email', $request->email)
            ->where('company_id', $request->company_id)
            ->first();

        if ($existingInvitation) {
            return back()->with('error', 'Invitation already sent to this email for the selected company.');
        }

        $token = Str::random(32);

        $invitation = Invitation::create([
            'email' => $request->email,
            'token' => $token,
            'role' => $request->role,
            'company_id' => $request->company_id,
            'invited_by' => auth()->id(),
         
        ]);

        // Send invitation email
        Mail::to($request->email)->send(new InvitationMail($invitation));

        return back()->with('success', 'Invitation sent successfully!');
    }

    /**
     * Send invitation within admin's company
     */
    public function storeCompany(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,member',
        ]);

        $user = auth()->user();

        // Check if invitation already exists
        $existingInvitation = Invitation::where('email', $request->email)
            ->where('company_id', $user->company_id)
            ->first();

        if ($existingInvitation) {
            return back()->with('error', 'Invitation already sent to this email.');
        }

        $token = Str::random(32);

        $invitation = Invitation::create([
            'email' => $request->email,
            'token' => $token,
            'role' => $request->role,
            'company_id' => $user->company_id,
            'invited_by' => $user->id,
          
        ]);

        try {
            
            Mail::to($request->email)->send(new InvitationMail($invitation));
            
            \Log::info('Company invitation email sent successfully to: ' . $request->email);
            
            return back()->with('success', 'Invitation sent successfully!');
            
        } catch (\Exception $e) {
         
            return back()->with('error', 'Invitation created but failed to send email. Please try again.');
        }

        return back()->with('success', 'Invitation sent successfully!');
    }

    /**
     * Show pending invitations
     */
    public function index()
    {
        $invitations = Invitation::with(['company', 'inviter'])
            ->where('invited_by', auth()->id())
            ->latest()
            ->get();

        return view('invitations.index', compact('invitations'));
    }

    /**
     * Cancel invitation
     */
    public function destroy(Invitation $invitation)
    {
        // Check if user has permission to delete this invitation
        if ($invitation->invited_by !== auth()->id() && !auth()->user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $invitation->delete();

        return back()->with('success', 'Invitation cancelled successfully.');
    }

    /**
 * Resend invitation for company founder
 */
    public function resend(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'company_id' => 'required|exists:companies,id',
        ]);

        // Delete any existing invitations for this company
        Invitation::where('company_id', $request->company_id)->delete();

        $token = Str::random(32);

        $invitation = Invitation::create([
            'email' => $request->email,
            'token' => $token,
            'role' => 'admin',
            'company_id' => $request->company_id,
            'invited_by' => auth()->id(),
        
        ]);

        // Send invitation email
        try {
            Mail::to($request->email)->send(new InvitationMail($invitation));
            return back()->with('success', 'Invitation resent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send invitation email. Please try again.');
        }
    }
}
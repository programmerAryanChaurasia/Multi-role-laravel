<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
  
    public function index()
    {
        $user = auth()->user();

        if ($user->isSuperAdmin()) {
            $shortUrls = ShortUrl::with(['user', 'company'])->latest()->get();
        } elseif ($user->isAdmin()) {
            $shortUrls = ShortUrl::where('company_id', $user->company_id)->latest()->get();
        } else {
            $shortUrls = $user->shortUrls()->latest()->get();
        }

        return view('short-urls.index', compact('shortUrls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|max:1000',
        ]);

        $shortCode = $this->generateUniqueShortCode();

        $shortUrl = ShortUrl::create([
            'original_url' => $request->original_url,
            'short_code' => $shortCode,
            'user_id' => auth()->id(),
            'company_id' => auth()->user()->company_id,
        ]);

        $shortUrl->short_url = url($shortCode);

        return back()->with([
            'success' => 'Short URL created successfully!',
            'short_url' => url($shortCode)
        ]);
    }

  
    public function redirect($shortCode)
    {
        $shortUrl = ShortUrl::where('short_code', $shortCode)->firstOrFail();

        // Increment click count
        $shortUrl->increment('click_count');

        return redirect($shortUrl->original_url);
    }

    
    public function destroy(ShortUrl $shortUrl)
    {
        // Check authorization
        if (auth()->user()->isMember() && $shortUrl->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if (auth()->user()->isAdmin() && $shortUrl->company_id !== auth()->user()->company_id) {
            abort(403, 'Unauthorized action.');
        }

        $shortUrl->delete();

        return back()->with('success', 'Short URL deleted successfully.');
    }

  
    private function generateUniqueShortCode($length = 6)
    {
        do {
            $shortCode = Str::random($length);
        } while (ShortUrl::where('short_code', $shortCode)->exists());

        return $shortCode;
    }
}
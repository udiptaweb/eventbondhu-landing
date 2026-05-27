<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AccountDeletionController extends Controller
{
    public function show()
    {
        return view('account-deletion');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'email'  => ['required', 'email', 'max:255'],
            'reason' => ['nullable', 'string', 'max:1000'],
        ]);

        try {
            Http::timeout(8)->post('https://biya.micromlm.in/api/account-deletion/request', $validated);
        } catch (\Throwable $e) {
            Log::warning('Account deletion API failed: ' . $e->getMessage());
        }

        return redirect()->route('account-deletion.show')
            ->with('success', true);
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Withdrawal;
class WithdrawlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all withdrawls
        $withdrawls = Withdrawal::with('user')->get();

        // Return the view with the withdrawls
        return view('dashboard.withdrawals', compact('withdrawls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the withdrawal by id
        $withdrawal = Withdrawal::find($id);

        // Check if the withdrawal exists
        if ($withdrawal) {
            // Delete the withdrawal
            $withdrawal->delete();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Withdrawal deleted successfully.');
        }

        // Redirect back with error message if not found
        return redirect()->back()->with('error', 'Withdrawal not found.');
    }
}

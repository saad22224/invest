<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all plans from the database
        $plans = \App\Models\Plan::all();

        // Return the view with the plans data
        return view('dashboard.plans', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.createplan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'duration_days' => 'required|integer',
            'profit_margin' => 'required|numeric',
        ]);

        Plan::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'duration_days' => $request->duration_days,
            'profit_margin' => $request->profit_margin,
        ]);
        return redirect()->route('plans.index')->with('success', 'Plan created successfully.');
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
        return view('dashboard.editplan', [
            'plan' => Plan::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'duration_days' => 'required|integer',
            'profit_margin' => 'required|numeric',
        ]);
        $plan = Plan::findOrFail($id);
        $plan->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'duration_days' => $request->duration_days,
            'profit_margin' => $request->profit_margin,
        ]);
        return redirect()->route('plans.index')->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return redirect()->route('plans.index')->with('success', 'Plan deleted successfully.');
    }
}

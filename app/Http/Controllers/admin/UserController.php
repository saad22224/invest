<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // الكود الخاص بعرض قائمة المستخدمين
        $users = User::all();
        return view('dashboard.users', compact('users'));
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
        $user = User::find($id);
        return view('dashboard.edituser', ['user' => User::find($id)]);
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
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح');
        } else {
            return redirect()->back()->with('error', 'المستخدم غير موجود');
        }

        // dd($user);
    }


    public function addmoney(Request $request , $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->balance += $request->amount;
            $user->deposits()->create([
                'amount' => $request->amount,
                'user_id' => $user->id,
            ]);
            $user->save();
            return redirect()->route('users.index')->with('success', 'تم إضافة المبلغ بنجاح');
        } else {
            return redirect()->back()->with('error', 'المستخدم غير موجود');
        }

        dd($request->all());
    }
}

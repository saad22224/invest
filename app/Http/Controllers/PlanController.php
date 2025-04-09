<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\models\User;
class PlanController extends Controller
{
    public function subscribeToPlan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:plans,id',
        ]);
        $plan = Plan::find($request->plan_id);
        $user = User::find($request->user_id);
        if ($user->balance < $plan->price) {
            return response()->json(['message' => 'رصيدك غير كافي'], 422);
        }
        $user->balance -= $plan->price;
        $user->save();

        $expiratoryDate = now()->addDays($plan->duration_days);
        $userPlan = Subscription::create([
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'expiratory_date' => $expiratoryDate,
        ]);


        return response()->json([
            'message' => 'Subscription successful',
            'user_plan' => $userPlan,
        ]);
    }


    public function checkPlanExpiry()
    {
        $user = auth()->user();
        $userPlans = Subscription::where('user_id', $user->id)->get();
        $plan = $userPlans->plan;
        foreach ($userPlans as $userPlan) {
            if ($userPlan->expiratory_date < now()) {
                $user->balance += $plan->price + ($plan->price * $plan->profit_margin / 100);
                $user->save();
                $userPlan->delete();
            }
        }

        return response()->json([
            'message' => 'Plan expired and balance updated',
            'user_plans' => $userPlans,
        ]);
    }


    public function getplans()
    {
        $plans = Plan::all();
        return response()->json([
            'message' => 'Plans retrieved successfully',
            'plans' => $plans,
        ]);
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
        ]);
        $user = User::find($request->user_id);
        if ($user->balance < $request->amount) {
            return response()->json(['message' => 'رصيدك غير كافي'], 422);
        }
        $user->balance -= $request->amount;
        $user->save();

        $user->withdrawals()->create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
        ]);

        return response()->json([
            'message' => 'Withdrawal successful',
            'user' => $user,
        ]);
    }

    public function lastWithdrawals()
    {
        $user = auth()->user();
        $withdrawals = $user->withdrawals()->latest()->take(5)->get();
        $deposits = $user->deposits()->latest()->take(5)->get();
        $subscriptions = $user->subscriptions()->latest()->take(5)->get();
        return response()->json([
            'message' => 'Last withdrawals retrieved successfully',
            'withdrawals' => $withdrawals,
            'deposits' => $deposits,
            'subscriptions' => $subscriptions,
        ]);
    }

    public function planresult()
    {
        $user = auth()->user();
        $userPlans = Subscription::where('user_id', $user->id)->get();
        $plan = $userPlans->plan;
        foreach ($userPlans as $userPlan) {
            if ($userPlan->expiratory_date < now()) {
                return response()->json([
                    'message' => 'Plan expired',
                    'profit' => $plan->price * $plan->profit_margin / 100,
                ]);
            }
        }
        return response()->json([
            'message' => 'Plan is still active',
            'profit' => 0,
        ]);
    }
}

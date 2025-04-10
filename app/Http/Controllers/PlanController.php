<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Offer;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\models\User;
class PlanController extends Controller
{
    public function subscribeToPlan(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
        ]);
        $plan = Plan::find($request->plan_id);
        $user = auth()->user();
        if ($user->balance < $plan->price) {
            return response()->json(['message' => 'رصيدك غير كافي'], 422);
        }
        $user->balance -= $plan->price;
        $user->save();

        $expiratoryDate = now()->addDays($plan->duration_days);
        // $expiratoryDate = now()->addMinutes(2); test
        $userPlan = Subscription::create([
            'user_id' => auth()->user()->id,
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
        $userPlans = Subscription::where('user_id', $user->id)
        ->with('plan')->get();
    
        $results = [];
    
        foreach ($userPlans as $userPlan) {
            $plan = $userPlan->plan;
            $isExpired = $userPlan->expiratory_date < now();
    
            if ($isExpired) {
                $profit = $plan->price * $plan->profit_margin / 100;
                $totalReturn = $plan->price + $profit;
    
                $user->balance += $totalReturn;
                $user->profit += $profit;
                $user->save();
    
                $userPlan->delete(); // حذف الاشتراك المنتهي
    
                $results[] = [
                    'plan' => $plan,
                    'status' => 'expired',
                    'profit' => $profit,
                    'total_return' => $totalReturn,
                ];
            } else {
                $results[] = [
                    'plan' => $plan,
                    'status' => 'active',
                    'profit' => 0,
                    'expiry_date' => $userPlan->expiratory_date,
                ];
            }
        }
    
        return response()->json([
            'message' => 'Plans processed successfully',
            'plans' => $results,
            'balance' => $user->balance,
            'total_profit' => $user->profit,
        ]);
    }
    

    public function getplans()
    {
        $plans = Plan::where('special', 0)->get();
        return response()->json([
            'message' => 'Plans retrieved successfully',
            'plans' => $plans,
        ]);
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        $user = auth()->user();
        if ($user->balance < $request->amount) {
            return response()->json(['message' => 'رصيدك غير كافي'], 422);
        }
        // $withdraw = Withdrawal::create([
        //     'user_id' => auth()->user()->id,
        //     'amount' => $request->amount,
        //     'usdt' => $request->usdt,
        //     'bank' => $request->bank,
        //     'western' => $request->western,
        //     'monney_office' => $request->monney_office,
        // ]);
        $user->balance -= $request->amount;
        $user->save();

        $user->withdrawals()->create([
            'user_id' => auth()->user()->id,
            'amount' => $request->amount,
            'usdt' => $request->usdt,
            'bank' => $request->bank,
            'western' => $request->western,
            'money_office' => $request->money_office,
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

    public function planresult(Request $request)
    {
        $user = auth()->user();
    
        // نحاول نجيب الاشتراك الخاص باليوزر والخطة اللي بعتها
        $userPlan = Subscription::where('user_id', $user->id)
            ->where('plan_id', $request->plan_id)
            ->with('plan')
            ->first();
    
        if (!$userPlan) {
            return response()->json([
                'message' => 'User is not subscribed to this plan',
                'profit' => 0,
            ]);
        }
    
        $plan = $userPlan->plan;
        $isExpired = $userPlan->expiratory_date < now();
    
        return response()->json([
            'message' => $isExpired ? 'Plan expired' : 'Plan is still active',
            'status' => $isExpired ? 'expired' : 'active',
            'profit' => $isExpired ? ($plan->price * $plan->profit_margin / 100) : 0,
            'plan' => $plan,
            'expiry_date' => $userPlan->expiratory_date,
        ]);
    }
    

    public function getoffers()
    {
        $offers = plan::where('special', 1)->get();
        if ($offers->isEmpty()) {
            return response()->json([
                'message' => 'No offers found',
            ]);
        }
        return response()->json([
            'message' => 'Offers retrieved successfully',
            'offers' => $offers,
        ]);
    }


    public function getuserprofit()
    {
        $user = auth()->user();
        $profit = $user->profit;
        if ($profit == 0) {
            return response()->json([
                'message' => 'No profit found',
            ]);
        }
        return response()->json([
            'message' => 'Profit retrieved successfully',
            'profit' => $profit,
        ]);
    }


    public function notifications(){
        $notifcation = Notification::all();
        return response()->json([
            'message' => 'Notifications retrieved successfully',
            'notifications' => $notifcation,
        ]);
    }

}

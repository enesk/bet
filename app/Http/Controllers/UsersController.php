<?php

namespace App\Http\Controllers;


use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
    }

    public function subscriptions()
    {
        $subscriptions = Subscription::where('active', 1)->get();

        return response()->json($subscriptions);
    }

    public function checkSubscription(Request $request) {
        $data = $request->all();

        $subscription = SubscriptionUser::where('user_id', $data['user_id'])->get();
        return response()->json($subscription);
    }

    public function subscribe(Request $request)
    {
        $user = User::where('token', $request['token'])->first();

        if (empty($user)):
            return response()->json(['error', 'Subscription failed']);
        else:
            $check = SubscriptionUser::where('user_id', $user->id)->get();
            if ($check->isEmpty()):
                $subscription = Subscription::find($request['subscription_id']);
                $endDate = strtotime(date('Y-m-d', strtotime("+3 days")));
                $subscribed = SubscriptionUser::create([
                    'user_id' => $user->id,
                    'subscription_id' => $subscription->id,
                    'ends_at' => $endDate
                ]);
                return response()->json(['success', $subscribed]);
            else:
                return response()->json(['error', 'You are already premium member!']);
            endif;
        endif;
    }

    public function login(Request $request)
    {
        $credentials = $request->all();
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])):
            // Authentication passed...
            return response()->json(Auth::user());
        else:
            return response()->json(['error' => 'Login failed!']);
        endif;
    }

}
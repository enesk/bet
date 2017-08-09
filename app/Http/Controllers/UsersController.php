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

    public function checkSubscription(Request $request)

    {
        $data = $request->all();
        $user = User::where('token', $data['token'])->first();
        if (empty($user)):
            return response()->json(['error' => 'Subscription failed']);
        endif;
        $subscription = SubscriptionUser::where('user_id', $user->id)->get();
        if ($subscription->isNotEmpty()):
            $now = date('Y-m-d');
            $data = $subscription->first();
            $endsAt = date("Y-m-d", $data->ends_at);
            $ended = $this->dateDifference($now, $endsAt);
            if ($ended > 0):
                return response()->json(['true']);
            else:
                $data->delete();
                return response()->json(['false']);
            endif;
        else:
            return response()->json(['false']);
        endif;
    }

    function dateDifference($date_1, $date_2, $differenceFormat = '%r%a')
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return (int)$interval->format($differenceFormat);

    }

    public function subscribe(Request $request)
    {
        $user = User::where('token', $request['token'])->first();

        if (empty($user)):
            return response()->json(['error' => 'Subscription failed']);
        else:
            $check = SubscriptionUser::where('user_id', $user->id)->get();
            if ($check->isEmpty()):
                $subscribed = SubscriptionUser::create([
                    'user_id' => $user->id,
                    'subscription_id' => $request['subscription_id'],
                    'subscription_alias' => $request['subscription_alias'],
                    'ends_at' => $request['ends_at']
                ]);
                return response()->json(['success' => $subscribed]);
            else:
                return response()->json(['error' => 'You are already premium member!']);
            endif;
        endif;
    }

    public function unSubscribe(Request $request)
    {
        $data = $request->all();
        $user = User::where('token', $data['token'])->first();

        if (empty($user)):
            return response()->json(['error' => 'Subscription failed']);
        endif;

        $subscription = SubscriptionUser::where('subscription_id', $data['subscription_id'])->get()->first();
        $subscription->delete();

        return response()->json(['success' => 'User unsubscribed!']);
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
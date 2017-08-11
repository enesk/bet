<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 03.08.17
 * Time: 14:29
 */

namespace App\Http\Controllers;


use App\Models\Competition;
use App\Models\Country;
use App\Models\SubscriptionUser;
use App\Models\User;
use Illuminate\Http\Request;

class EstimatesController extends Controller
{

    public function __construct(Request $request)
    {
    }

    public function estimates(Request $request)
    {

    }

    public function played(Request $request)
    {
        $message = ['error' => 'Authentication failed!'];
        $data = $request->all();
        if (!isset($data['token'])):
            return response()->json($message);
        endif;
        $check = User::where('token', $data['token'])->get();
        if ($check->isEmpty()):
            return response()->json($message);
        endif;

        $data = [];
        $competitions = Competition::where('played', 1)->get();
        foreach($competitions as $competition):
            $data[] = [
                'country' => $competition->country->name,
                'leauge' => $competition->league->name,
                'category' => $competition->category->name,
                'home_team' => $competition->home_team,
                'away_team' => $competition->away_team,
                'start_date' => strtotime($competition->start_time),
                'rate' => $competition->rate,
                'trust' => $competition->trust,
                'image' => env('APP_URL').'/'.$competition->country->url,
                'advice' => $competition->advice->name,
                'played' => $competition->played,
                'won' => $competition->won
            ];
        endforeach;

        return response()->json($data);
    }

    public function waiting(Request $request)
    {
        $message = ['error' => 'Authentication failed!'];
        $data = $request->all();
        $advice = false;
        if (!isset($data['token'])):
            return response()->json($message);
        endif;
        $user = User::where('token', $data['token'])->get();
        if ($user->isEmpty()):
            return response()->json($message);
        endif;
        $data = [];

        $competitions = Competition::where('played', 1)->get();
        foreach($competitions as $competition):
            $premium = SubscriptionUser::where('user_id', $user->first()->id)->get();
            if ($premium->isNotEmpty()):
                $advice = $competition->advice->name;
            endif;
            $data[] = [
                'country' => $competition->country->name,
                'leauge' => $competition->league->name,
                'category' => $competition->category->name,
                'home_team' => $competition->home_team,
                'away_team' => $competition->away_team,
                'start_date' => strtotime($competition->start_time),
                'rate' => $competition->rate,
                'trust' => $competition->trust,
                'image' => env('APP_URL').'/'.$competition->country->url,
                'advice' => $advice,
                'played' => $competition->played,
                'won' => $competition->won
            ];
        endforeach;

        return response()->json($data);
    }

}
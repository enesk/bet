<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 03.08.17
 * Time: 14:29
 */

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class EstimatesController extends Controller {

    public function __construct(Request $request)
    {
    }

    public function estimates(Request $request) {
        $message = ['error' => 'Authentication failed!'];
        $data = $request->all();
        if(!isset($data['token'])):
            return response()->json($message);
        endif;
        $check = User::where('token', $data['token'])->get();
        if($check->isEmpty()):
            return response()->json($message);
        endif;

        $data = [
            [
                'country' => 'Deutschland',
                'leauge' => 'Bundesliga',
                'category' => 'Basketball',
                'home_team' => 'Ajax',
                'away_team' => 'Nice',
                'start_date' => '1501783200',
                'rate' => '2.32',
                'trust' => '70',
                'image' => 'http://test.com/test.png',
                'advice' => 'Über 2.5 Tore',
                'played' => 0,
                'won' => 0
            ],
            [
                'country' => 'Deutschland',
                'leauge' => 'Bundesliga',
                'category' => 'Basketball',
                'home_team' => 'Ajax',
                'away_team' => 'Nice',
                'start_date' => '1501783200',
                'rate' => '2.32',
                'trust' => '70',
                'image' => 'http://test.com/test.png',
                'advice' => 'Über 2.5 Tore',
                'played' => 1,
                'won' => 0
            ],
            [
                'country' => 'Deutschland',
                'leauge' => 'Bundesliga',
                'category' => 'Basketball',
                'home_team' => 'Ajax',
                'away_team' => 'Nice',
                'start_date' => '1501783200',
                'rate' => '2.32',
                'trust' => '70',
                'image' => 'http://test.com/test.png',
                'advice' => 'Über 2.5 Tore',
                'played' => 1,
                'won' => 1,
            ],
        ];
        return response()->json($data);
    }

    public function played(Request $request) {
        $message = ['error' => 'Authentication failed!'];
        $data = $request->all();
        if(!isset($data['token'])):
            return response()->json($message);
        endif;
        $check = User::where('token', $data['token'])->get();
        if($check->isEmpty()):
            return response()->json($message);
        endif;

        $data = [
            [
                'country' => 'Deutschland',
                'leauge' => 'Bundesliga',
                'category' => 'Basketball',
                'home_team' => 'Ajax',
                'away_team' => 'Nice',
                'start_date' => '1501783200',
                'rate' => '2.32',
                'trust' => '70',
                'image' => 'http://test.com/test.png',
                'advice' => 'Über 2.5 Tore',
                'played' => 1,
                'won' => 0
            ],
            [
                'country' => 'Deutschland',
                'leauge' => 'Bundesliga',
                'category' => 'Basketball',
                'home_team' => 'Ajax',
                'away_team' => 'Nice',
                'start_date' => '1501783200',
                'rate' => '2.32',
                'trust' => '70',
                'image' => 'http://test.com/test.png',
                'advice' => 'Über 2.5 Tore',
                'played' => 1,
                'won' => 1,
            ],
        ];

        return response()->json($data);
    }

    public function waiting(Request $request) {
        $message = ['error' => 'Authentication failed!'];
        $data = $request->all();
        if(!isset($data['token'])):
            return response()->json($message);
        endif;
        $check = User::where('token', $data['token'])->get();
        if($check->isEmpty()):
            return response()->json($message);
        endif;

        $data =   [
            'country' => 'Deutschland',
            'leauge' => 'Bundesliga',
            'category' => 'Basketball',
            'home_team' => 'Ajax',
            'away_team' => 'Nice',
            'start_date' => '1501783200',
            'rate' => '2.32',
            'trust' => '70',
            'image' => 'http://test.com/test.png',
            'advice' => 'Über 2.5 Tore',
            'played' => 0,
            'won' => 0
        ];

        return response()->json($data);
    }



}
<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 03.08.17
 * Time: 14:29
 */

namespace App\Http\Controllers;


class EstimatesController extends Controller {

    public function __construct()
    {
    }

    public function estimates() {
        $data = [
            [
                'country' => 'Deutschland',
                'leauge' => 'Bundesliga',
                'category' => 'Basketball',
                'home_team' => 'Ajax',
                'away_team' => 'Nice',
                'start_date' => '03.08.2017',
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
                'start_date' => '03.08.2017',
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
                'start_date' => '03.08.2017',
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

}
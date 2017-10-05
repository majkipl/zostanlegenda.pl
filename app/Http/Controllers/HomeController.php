<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home/index', [
            'isEndPromotion' => false,
            'isEndContest' => false,
            'isEndResult' => false,
            'week' => [],
            'dateWeek' => [
                '14.11.2017',
                '21.11.2017',
                '28.11.2017',
                '05.12.2017',
                '12.12.2017',
                '19.12.2017',
                '28.12.2017']
        ]);
    }

//    public static function getDateWeek( $index = false, $count = false )
//    {
//        $dates = array('14.11.2017',
//            '21.11.2017',
//            '28.11.2017',
//            '05.12.2017',
//            '12.12.2017',
//            '19.12.2017',
//            '28.12.2017',);
//
//        return $dates[$count - $index - 1];
//    }

}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EventModel;
use App\USer;
use Session;

class Calendar extends Controller
{
    public function calendarEvent(){
    	$events = [];
    	$users = User::find(1)->leaves; 
    	foreach($users as $user){
    	 	$events[] = \Calendar::event(
		    "My Leave", //event title
		    true, //full day event?
		    new \DateTime($user->start_date), //start time (you can also use Carbon instead of DateTime)
		    new \DateTime($user->end_date), //end time (you can also use Carbon instead of DateTime)
		    'stringEventId' //optionally, you can specify an event ID
			);
		}
        /*$events[] = \Calendar::event(
		    "Sick leave", //event title
		    true, //full day event?
		    new \DateTime('2016-09-14'), //start time (you can also use Carbon instead of DateTime)
		    new \DateTime('2016-09-19'), //end time (you can also use Carbon instead of DateTime)
		    'stringEventId' //optionally, you can specify an event ID
		);
		$events[] = \Calendar::event(
		    "Casual Leave", //event title
		    true, //full day event?
		    new \DateTime('2016-09-22'), //start time (you can also use Carbon instead of DateTime)
		    new \DateTime('2016-09-27'), //end time (you can also use Carbon instead of DateTime)
		    'stringEventId' //optionally, you can specify an event ID
		);

		$events[] = \Calendar::event(
		    "Casual Leave", //event title
		    true, //full day event?
		    new \DateTime('2016-10-02'), //start time (you can also use Carbon instead of DateTime)
		    new \DateTime('2016-10-05'), //end time (you can also use Carbon instead of DateTime)
		    1 //optionally, you can specify an event ID
		);

		$events[] = \Calendar::event(
		    "Casual Leave", //event title
		    true, //full day event?
		    new \DateTime('2016-11-07'), //start time (you can also use Carbon instead of DateTime)
		    new \DateTime('2016-11-12'), //end time (you can also use Carbon instead of DateTime)
		    1 //optionally, you can specify an event ID
		);*/

        //$eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event  

        $calendar = \Calendar::addEvents($events,[ //set custom color fo this event
        'color' => '#ff0000',
        'textColor' => '#fff',
    	]) //add an array with addEvents
            ->setOptions([ //set fullcalendar options
                'firstDay' => 0,
            ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                'viewRender' => 'function() {}'
        ]);
        //protected $primaryKey = 'emp_id';   
        //$user = User::find(1)->leaves;    
		return view('admin.calendar.index', compact('calendar', 'users'));
    }

}

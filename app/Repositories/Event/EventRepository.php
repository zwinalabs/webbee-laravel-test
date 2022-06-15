<?php

namespace App\Repositories\Event;

use App\Models\Event;
use App\Models\Workshop;

class EventRepository implements EventInterface
{
	/**
    * @var Event
    */
    private $event;
    /**
     * EventRepository constructor.
     * 
     * @param Event $event
     * 
     */   
	public function __construct(Event $event) {
		$this->event = $event;
	}
	/**
	 * Get All Events
	 * @param
	 * */
	public function getAll()
    {
        try {
        	$events = $this->event->select()->with('workshops')->orderBy('id')->get();
        	return response()->json($events , 200);

    	} catch (\Exception $e) {
	        return array('status' => false, 'message' => 'error: \n'.$e->getMessage());
    	}
	}


}
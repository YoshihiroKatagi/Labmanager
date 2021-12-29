<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class ApiController extends Controller
{
    public function test()
    {
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);
        
        $calendarId = env('GOOGLE_CALENDAR_ID');
        
        $event = new Google_Service_Calendar_Event(array(
            'summary' => 'テスト',
            'start' => array(
                'dateTime' => '2021-12-26T12:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),
            'end' => array(
                'dateTime' => '2021-12-26T13:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),
        ));
        
        $event = $service->events->insert($calendarId, $event);
        echo "イベントを追加しました。";
    }
    
    // private function getClient()
    // {
    //     $client = new Google_Client();
        
    //     $client->setApplicationName('GoogleCalendarAPIのテスト');
    //     $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
    //     $client->setAuthConfig(storage_path('app/api-key/indigo-plate-336002-48ff8f81b571.json'));
        
    //     return $client;
    // }
    
    public function getEvents()
    {
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);
        $calendarId  = env('GOOGLE_CALENDAR_ID');
        
        $now = date('c');
        $optParams = array(
            'maxResults' => 100,
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeZone' => 'Asia/Tokyo',
            'timeMin' => $now,
        );
        
        $results = $service->events->listEvents($calendarId, $optParams);
        $events = [];
        foreach ($results->getItems() as $event) {
            $tmp['eventId'] = $event->id;
            $tmp['summary'] = $event->summary;
            $tmp['start'] = date('Y/m/d H:i', strtotime($event->start->dateTime));
            $tmp['end'] = date('Y/m/d H:i', strtotime($event->end->dateTime));
            $events[] = $tmp;
        }
        return view('mypages/calendar')->with([
            'events' => $events,
        ]);
    }
    
    public function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Calendar API plus Laravel');
        $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
        $client->setAuthConfig(storage_path('app/api-key/indigo-plate-336002-48ff8f81b571.json'));
        
        return $client;
    }
}

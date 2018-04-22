<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use App\Models\Location;
use Illuminate\Http\Request;
use Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('events.index',['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $event_types = EventType::all();

        return view('events.create',[
            'locations' => $locations,
            'event_types' => $event_types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|max:50',
            'description' => 'required|max:255',
            'location_id' => 'required',
            'type_id'     => 'required',
            'start'       => 'date_format:"Y-m-d H:i:s"|required',
            'end'         => 'date_format:"Y-m-d H:i:s"|required',
            'url'         => 'url',
            'ticket_url'  => 'url',
            'start_cost'  => 'numeric',
            'end_cost'    => 'numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $event = Event::create($request->except(['_token','_method']));

        return redirect()->route('events.show',['event' => $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show',['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {

        $locations = Location::all();
        $event_types = EventType::all();

        return view('events.edit',[
            'event' => $event,
            'locations' => $locations,
            'event_types' => $event_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $validator = Validator::make($request->all(), [
            'title'       => 'required|max:50',
            'description' => 'required|max:255',
            'location_id' => 'required',
            'type_id'     => 'required',
            'start'       => 'date_format:"Y-m-d H:i:s"|required',
            'end'         => 'date_format:"Y-m-d H:i:s"|required',
            'url'         => 'nullable|url',
            'ticket_url'  => 'nullable|url',
            'start_cost'  => 'nullable|numeric',
            'end_cost'    => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $event->fill($request->except(['_token','_method']));
        $event->save();

        return redirect()->route('events.show',['event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    // get events
    public function getAll(): View
    {
        // get data
        $events = Event::all();

        // send to view
        return view('dashboard', [
            'events' => $events,
        ]);

    }

    // create event
    public function create(Request $request): RedirectResponse
    {
        //create post
        Event::create([
            'date' => $request->date,
            'name' => $request->name,
            'description' => $request->description,
            "location" => $request->location
        ]);

        //redirect to index
        return redirect()->route('dashboard');
    }

    // edit event
    public function edit(Request $request, $id): RedirectResponse
    {
        // get event by id
        $event = Event::find($id);

        // edit event
        $event->update([
            'date' => $request->date,
            'name'=> $request->name,
            'description' => $request->description,
            'location'=> $request->location
        ]);

        // redirect to index
        return redirect()->route('dashboard');
    }

    // delete event
    public function delete($id): RedirectResponse
    {
        // get event by id
        $event = Event::find($id);

        // delete event
        $event->delete();

        // redirect to index
        return redirect()->route('dashboard');
    }
}

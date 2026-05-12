<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function home()
    {
        $tickets = Ticket::latest()->get();
        return view('tickets.home', compact('tickets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|in:technical,arrangement,general',
        ]);
        Ticket::create($request->only('title', 'description', 'category'));
        return redirect()->route('home')->with('success', 'Ticket created!');
    }

    public function technical()
    {
        $tickets = Ticket::where('category', 'technical')->latest()->get();
        return view('tickets.technical', compact('tickets'));
    }

    public function arrangement()
    {
        $tickets = Ticket::where('category', 'arrangement')->latest()->get();
        return view('tickets.arrangement', compact('tickets'));
    }

    public function status()
    {
        $tickets = Ticket::orderBy('status')->latest()->get();
        return view('tickets.status', compact('tickets'));
    }

    public function followup()
    {
        $tickets = Ticket::whereNotNull('follow_up')->latest()->get();
        return view('tickets.followup', compact('tickets'));
    }

    public function updateFollowup(Request $request, Ticket $ticket)
    {
        $request->validate(['follow_up' => 'required|string']);
        $ticket->update(['follow_up' => $request->follow_up]);
        return back()->with('success', 'Follow-up updated!');
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate(['status' => 'required|in:open,in_progress,resolved,closed']);
        $ticket->update(['status' => $request->status]);
        return back()->with('success', 'Status updated!');
    }

    public function updateTechnical(Request $request, Ticket $ticket)
    {
        $request->validate([
            'accepted_by'   => 'required|string|max:255',
            'date_accepted' => 'required|date',
            'time_accepted' => 'required',
        ]);
        $ticket->update($request->only('accepted_by', 'date_accepted', 'time_accepted'));
        return back()->with('success', 'Technical info updated!');
    }

    public function updateArrangement(Request $request, Ticket $ticket)
    {
        $request->validate([
            'followup_by'   => 'required|string|max:255',
            'division'      => 'required|in:servicing,installation',
            'date_followup' => 'required|date',
        ]);
        $ticket->update($request->only('followup_by', 'division', 'date_followup'));
        return back()->with('success', 'Arrangement info updated!');
    }
}

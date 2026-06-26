<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support\Ticket;
use App\Models\User;
use App\Models\Support\Department;
use App\Models\Support\SlaPolicy;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $tickets = Ticket::latest()->paginate(10);

        return view('admin.tickets.index', compact('tickets'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $users = User::orderBy('name')->get();

        $departments = Department::where('is_active', true)
            ->orderBy('name')
            ->get();

        $slaPolicies = SlaPolicy::orderBy('priority')->get();

        return view('admin.tickets.create', compact(
            'users',
            'departments',
            'slaPolicies'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = \App\Models\Support\Ticket::with([
            'user',
            'department',
            'assignedTo',
            'messages.user',
            'attachments',
            'sla',
        ])->findOrFail($id);

        $sla = $ticket->sla;

        $slaStatus = [
            'response_overdue' => $sla?->response_due_at
                ? now()->gt($sla->response_due_at)
                : false,

            'resolution_overdue' => $sla?->resolution_due_at
                ? now()->gt($sla->resolution_due_at)
                : false,
        ];

        return view('admin.tickets.show', compact(
            'ticket',
            'sla',
            'slaStatus'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.tickets.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

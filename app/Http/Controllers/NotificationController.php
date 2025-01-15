<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\NotificationTemplate;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = NotificationTemplate::get();
        return view('notifications.templates', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notificationsTem = NotificationTemplate::get();
        return view('notifications.new_template', compact('notificationsTem'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        NotificationTemplate::create($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notification template created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $notificationsTem = NotificationTemplate::find($id);
        return view('notifications.edit_template', compact('notificationsTem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $notificationsTem = NotificationTemplate::find($id);
        $notificationsTem->update($request->all());

        return redirect()->route('notifications.edit', $notificationsTem->id)->with('success', 'Notification template updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notificationsTem = NotificationTemplate::find($id);
        $notificationsTem->delete();
    }

    public function schoolUserNotifications()
    {
        $notifications = Notification::with('notificationTemplate')->where('user_id', auth()->user()->id)->get();
        return view('notifications.user_notifications',[
            'notifications' => $notifications
        ]);
    }
}

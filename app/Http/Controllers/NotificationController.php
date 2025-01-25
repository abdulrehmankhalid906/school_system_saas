<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\NotificationTemplate;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id','name','school_id')->role('School')->with('school:id,name')->get();
        $notifications = NotificationTemplate::get();
        return view('notifications.templates', compact('notifications','users'));
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

    //Function to view notification to the schools.
    public function show(string $id)
    {
        $notificationsTem = Notification::with('notificationTemplate')->where('user_id', auth()->user()->id)->find($id);
        return view('notifications.show_template', compact('notificationsTem'));
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

    public function sendNotifications(Request $request)
    {
        foreach($request->user_ids as $userid)
        {
            Notification::create([
                'notification_template_id' => $request->notification_id,
                'user_id' => $userid
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => "The notification has been sent"
        ]);
    }

    public function deleteNotification(string $id)
    {
        try
        {
            $notification = Notification::where('user_id', auth()->user()->id)->find($id);
            $notification->delete();
            return response()->json(['message' => 'Notification has been removed!']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'failure' => $e->getMessage()
            ], 500);
        }
    }
}

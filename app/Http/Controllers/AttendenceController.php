<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\Attendence;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function index()
    {
        $classes = Klass::where('school_id', InitS::getSchoolid())->select('id', 'name')->get();
        return view('attendence.index',[
            'classes' => $classes
        ]);
    }

    public function getAttendenceStudent(Request $request)
    {
        $attendence = Student::with(['user' => function($query) {
            $query->select('id','name');
        }])->where('klass_id', $request->class_id)->where('section_id', $request->section_id)->get();

        //dd($attendence);

        return response()->json([
            'message' => "No Data",
            'data' => $attendence
        ]);
    }

    public function submitAttendance(Request $request)
    {
        $attendanceData = $request->attendance;

        if (empty($attendanceData)) {
            return response()->json(['message' => 'No attendance data provided.'], 400);
        }

        foreach ($attendanceData as $attendance) {
            Attendence::create(
                [
                    'klass_id' => $request->class_id,
                    'section_id' => $request->section_id,
                    'user_id' => $attendance['user_id'],
                    'date' => $request->date,
                ],
                [
                    'status' => $attendance['status'],
                ]
            );
        }

        return response()->json(['message' => 'Attendance saved successfully.'], 200);
    }

    public function showAttendance(Request $request)
    {
        $attendance = Attendence::with('user')->where('klass_id', $request->class_id)->where('section_id',$request->section_id)->where('date', $request->attendence_date)->get();

        return response()->json([
            'message' => "Attendance Fetch Successfully!",
            'data' => $attendance
        ]);
    }


    public function sendSMS(Request $request)
    {
        try {
            $recipients =  array(array("phone" => "923415921294"));
            $channels = array("sms");
            $sms = array(
                "from" => env('MESSAGGIO_API'),
                "content" => array(
                    array(
                        "type" => "text",
                        "text" => "This is the sample message"
                    )
                )
            );

            $data = array(
                "recipients" => $recipients,
                "channels" => $channels,
                "sms" => $sms
            );

            $rawdata = json_encode($data);

            $curl = curl_init("https://msg.messaggio.com/api/v1/send");
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Content-Type: application/json",
                    "Accept: application/json",
                    "Messaggio-Login: " . env('MESSAGGIO_LOGIN')
                )
            );
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $rawdata);

            $json_response = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            $response = json_decode($json_response, true);
            return response()->json([
                'success' => true,
                'data' => $response
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}

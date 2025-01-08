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


    public function sendSMS()
    {
        $phone = 923415921294;

        try {

            $recipients = array(array("phone" => $phone));
            $channels = array("sms");
            $sms = array(
                "from" => env('MESSAGGIO_API'), // or env('MESSAGGIO_API') for Laravel
                "content" => array(
                    array(
                        "type" => "text",
                        "text" => "Test message has been sent."
                    )
                )
            );

            $data = array(
                "recipients" => $recipients,
                "channels" => $channels,
                "sms" => $sms
            );

            $rawdata = json_encode($data);
            if ($rawdata === false) {
                throw new \Exception("Failed to encode JSON data");
            }

            $curl = curl_init("https://msg.messaggio.com/api/v1/send");
            if (!$curl) {
                throw new \Exception("Failed to initialize cURL");
            }

            curl_setopt_array($curl, [
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Accept: application/json",
                    "Messaggio-Login: " . env('MESSAGGIO_LOGIN') // or env('MESSAGGIO_LOGIN') for Laravel
                ),
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $rawdata
            ]);

            $json_response = curl_exec($curl);
            if ($json_response === false) {
                throw new \Exception("cURL Error: " . curl_error($curl));
            }

            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            $response = json_decode($json_response, true);
            if ($response === null && json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception("Failed to decode API response");
            }

            return $response;
        } catch (\Exception $e) {
            // Log error or handle it appropriately
            throw $e;
        }
    }
}

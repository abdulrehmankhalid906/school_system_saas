<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use GuzzleHttp\Client;
use App\Models\Student;
use App\Models\Attendence;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    use HttpResponses;

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
        return $this->success($attendence, "Students fetched successfully");
    }

    public function submitAttendance(Request $request)
    {
        $attendanceData = $request->attendance;

        if (empty($attendanceData)) {
            return $this->error([], "No attendance data provided", 404);
        }

        foreach ($attendanceData as $attendance) {
            Attendence::create([
                'klass_id' => $request->class_id,
                'section_id' => $request->section_id,
                'date' => $request->date,
                'user_id' => $attendance['user_id'],
                'status' => $attendance['status']
            ]);
        }

        return $this->success([], "Attendance saved successfully");
    }

    public function showAttendance(Request $request)
    {
        $attendance = Attendence::with('user')->where('klass_id', $request->class_id)->where('section_id',$request->section_id)->where('date', $request->attendence_date)->get();

        return $this->success($attendance, "Attendance Fetch Successfully!");
    }

    //Under Verification...
    // public function sendSMS(Request $request)
    // {
    //     $recipients = [
    //         ["phone" => "923415921294"]
    //     ];

    //     $channels = ["sms"];

    //     $sms = [
    //         "content" => [
    //             ["type" => "text", "text" => "Sample fake PHP text for the example"]
    //         ],
    //         "from" => "ctv13uv5qq2s73bvf2sg"
    //     ];

    //     $data = [
    //         "recipients" => $recipients,
    //         "channels" => $channels,
    //         "sms" => $sms
    //     ];

    //     $rawdata = json_encode($data);

    //     /* Preparing request */
    //     $curl = curl_init("https://msg.messaggio.com/api/v1/send");
    //     curl_setopt($curl, CURLOPT_HEADER, false);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, [
    //         "Content-Type: application/json",
    //         "Accept: application/json",
    //         "Messaggio-Login: ctv11dtipr1s73dk7i7g" // Project login
    //     ]);
    //     curl_setopt($curl, CURLOPT_POST, true);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $rawdata);

    //     /* Executing request */
    //     $json_response = curl_exec($curl);

    //     /* Reading the response and closing connection */
    //     $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //     curl_close($curl);

    //     $response = json_decode($json_response, true);
    //     print_r($response);
    // }



    public function sendSMS(Request $request)
    {
        $email = "grademaster@grademaster.site";
        $key = "019b0e96781d68841af18c609ae857402a";
        $mask = "Digi SMS";
        $to = "923184674332";
        $message = "Dear Parents, Your child Ali is absent from school today.";
        // Preparing Data to POST Request / DO NOT TOUCH BELOW
        $mask = urlencode($mask);
        $message = urlencode($message);
        $data = "email=".$email."&key=".$key."&mask=".$mask."&to=".$to."&message=".$message;
        // Sending the POST Request with cURL to Branded SMS Pakistan Server
        $ch = curl_init('https://secure.h3techs.com/sms/api/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // Result from Branded SMS Pakistan including Return ID
        return $result; exit;
        curl_close($ch);
    }
}

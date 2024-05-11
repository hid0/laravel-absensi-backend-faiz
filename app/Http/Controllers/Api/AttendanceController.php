<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
  public function checkin(Request $request)
  {
    // checkin location
    $request->validate([
      'latitude' => 'required',
      'longitude' => 'required',
    ]);

    // save checkin
    $attendance = new Attendance();
    $attendance->user_id = $request->user()->id;
    $attendance->date = date('Y-m-d');
    $attendance->time_in = date('H:i:s');
    $attendance->latlon_in = $request->latitude . "," . $request->longitude;
    $attendance->save();

    return response([
      'message' => 'Checkin successfully!',
      'data' => $attendance
    ], 200);
  }

  public function checkout(Request $request)
  {
    $request->validate([
      'latitude' => 'required',
      'longitude' => 'required',
    ]);

    // get attendance of today
    $attendance = Attendance::where('user_id', $request->user()->id)->where('date', date('Y-m-d'))->first();

    // if unattendance of today
    if (!$attendance) {
      return response(['message' => 'Checkin first!'], 400);
    }

    // save checkout
    $attendance->time_out = date('H:i:s');
    $attendance->latlon_out = $request->latitude . "," . $request->longitude;
    $attendance->save();

    return response([
      'message' => 'Checkout Successfully!',
      'data' => $attendance
    ], 200);
  }

  public function isCheckedIn(Request $request)
  {
    // get attendance of today
    $attendance = Attendance::where('user_id', $request->user()->id)->where('date', date('Y-m-d'))->first();

    return response([
      'checkin' => $attendance ? true : false,
    ], 200);
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
  public function index()
  {
    $attendances = Attendance::paginate(10);
    return view('pages.attendance.index', compact('attendances'));
  }
}

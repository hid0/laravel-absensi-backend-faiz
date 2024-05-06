<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
  public function index($id)
  {
    $company = Company::find(1);
    return view('pages.company.show', compact('company'));
  }
}

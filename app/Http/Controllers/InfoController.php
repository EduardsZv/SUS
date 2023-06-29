<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function getPatientInfo(Request $r) {

        $patientPK = $r->input('pk');

        return view('patientinfo', ['PK' => $patientPK]);
    }
}

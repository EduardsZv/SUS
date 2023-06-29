<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function searchquery(Request $r) {
        $r->validate([
            'atslegasvards' => 'required',
            '_token' => 'required',
        ]);
        $keyword = $r->input('atslegasvards');

        return view('patientlist')->with('keyword', $keyword);
    }
}

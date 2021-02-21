<?php

namespace App\Http\Controllers;

use App\BirthDate;
use Illuminate\Http\Request;

class BirthDateController extends Controller
{

    public function createNew()
    {
        return view('form');
    }

    public function getAll()
    {
        return view('display', ['dates' => BirthDate::all()->sortBy('birthdate')]);
    }

    public function getDate($id)
    {
        return view('form', ['date' => BirthDate::find($id)]);
    }

    public function delete($id)
    {
        $date = BirthDate::find($id);
        $date->delete();
        return redirect('/')->with('message', 'Birth Date Deleted!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'month' => 'required',
            'day' => 'required',
            'year' => 'required',
        ]);
        $birthdate = BirthDate::find($id);
        $newdate = sprintf("%d-%02d-%02d", $request->year, $request->month, $request->day);
        $birthdate->name = $request->name;
        $birthdate->birthdate = $newdate;
        $birthdate->save();
        return redirect('/')->with('message', 'Birth Date Updated!');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'month' => 'required',
            'day' => 'required',
            'year' => 'required',
        ]);
        $birthdate = new BirthDate();
        $newdate = sprintf("%d-%02d-%02d", $request->year, $request->month, $request->day);
        $birthdate->name = $request->name;
        $birthdate->birthdate = $newdate;
        $birthdate->save();
        return redirect('/')->with('message', 'Birth Date Added!');
    }
}

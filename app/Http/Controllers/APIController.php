<?php
namespace App\Http\Controllers;

//Requests
use App\Http\Requests;
use Illuminate\Http\Request;

//Models
use App\Countries;
use App\States;
use App\Cities;


class APIController extends Controller
{
    //View
    public function index()
    {
        $countries = Countries::pluck("name", "id");
        return view('index',compact('countries'));
    }

    //List of states based on country_id
    public function getStateList(Request $request)
    {
        $states = States::where("country_id", $request->country_id)->pluck("name","id");
        return response()->json($states);
    }

    //List of cities based on state_id
    public function getCityList(Request $request)
    {
        $cities = Cities::where("state_id", $request->state_id)->pluck("name","id");
        return response()->json($cities);
    }
}
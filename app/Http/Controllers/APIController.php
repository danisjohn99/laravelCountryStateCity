<?php
namespace App\Http\Controllers;

//Requests
use App\Http\Requests;
use Illuminate\Http\Request;

//Models
use App\Countries;
use App\States;
use App\Cities;
use App\User;

//Password
use Hash;


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

    public function save(Request $request)
    {
        try {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->country_id = $request->country;
                $user->state_id = $request->state;
                $user->city_id = $request->city;
                $user->password = Hash::make($request->password);
                $user->save();

                return "Saved";
            
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function edit($id){

        $user = User::findOrfail($id);
        $password = bcrypt($user->password);
  
        $countries = Countries::pluck("name", "id");
        return view('edit',compact('user','countries', 'password'));
    }



}

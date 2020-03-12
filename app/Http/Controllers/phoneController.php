<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\phone;

class phoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = Auth()->user()->id;
        $users = User::find($userId);
        $usersConNumbers = phone::all()->where('user_id', $userId);
        return view('pages.account')->with('users', $users)->with('usersConNumbers', $usersConNumbers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $userId = Auth()->user()->id;
        $Phone = phone::all()->where('user_id', $userId);
        $insertNum = $request->input('number');
        $insertTyp = $request->input('type');

        $count = phone::all()->where('user_id', $userId)->where('phone_number', $insertNum);
        if(count($count) > 0){
            return redirect('/account')->with('error', 'already number');
        }
        else{
            $new = new phone;
            $new->phone_number = $insertNum;
            $new->phone_type = $insertTyp;
            $new->user_id = $userId;
            $new->save();
            return redirect('/account')->with('success', 'Successfully inserted Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $numid = phone::find($id);
        $numid->delete();
        return redirect('/account')->with('successfully delete on of your contact number');
    }
}

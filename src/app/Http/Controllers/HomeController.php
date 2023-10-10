<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $members = Member::get();
//        $members = Member::select('*')->get()->makeHidden(['id']);
//        $members = Member::get()->toArray();
        return view('home', ['members' => $members, 'id' => '']);
    }

    /**
     * Display the specified resource.
     */
    public function hide_or_show($id, $hidden)
    {
//        $tw = config('tw_share');
//        $tw = ['link' => $tw['link'], 'text' => $tw['text']];
//        return view('main.social_buttons', ['data' => ['number' => $data->id, 'tw' => $tw]]);

        $member = Member::find($id);
        $member->hidden = $hidden;
        $member->save();
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('main.index', ['request' => Member::find($id)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return response()->json();
    }
}

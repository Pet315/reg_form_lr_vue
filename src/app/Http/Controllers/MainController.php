<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function __invoke() {
        return view('main.index');
    }

    public function step2(Request $request) {
        return view('main.step2', ['request' => $request['data']]);
    }

    public function social_buttons(Request $request) {
        return view('main.social_buttons', ['request' => $request['data']]);
    }

    public function submit_form1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:50',
            'birthdate' => 'required|date',
            'report_subject' => 'required|max:150',
//            'phone' => 'required',
//            'phone' => 'required|regex:/\+\d{1,2}\s\(\d{3}\)\s\d{3}-\d{4}/',
            'phone' => 'required|not_regex:/_/',
            'email' => 'required|email|max:70',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $emailRepeats = Member::where('email', $request->email)->count();
        $phoneRepeats = Member::where('phone', $request->phone)->count();

        if ($emailRepeats > 0) {
            return response()->json(['errors' => ['email' => ['This email already exists']]], 422);
        }

        if ($phoneRepeats > 0) {
            return response()->json(['errors' => ['phone' => ['This phone number already exists']]], 422);
        }

        Member::where('email', $request->email)->where('phone', $request->phone)->delete();
        Member::create($request->all());

        return response()->json(['request' => $request->all()], 200);
//        return view('main.step2', ['request' => $request]);
    }

    public function submit_form2(Request $req) {
        $request = $req->except('_token');

        if ($request['photo']) {
            $photoName = uniqid('', true) . '_' . $request['photo'];
            $req->file('photo')->storeAs('img', $photoName);
        } else {
            $photoName = '';
        }

        $request['photo'] = $photoName;
        Member::where('email', $request['email'])->where('phone', $request['phone'])->delete();
        Member::insert($request);

        $tw = ['link' => config('link'), 'text' => config('text')];
        echo config('link');
        return response()->json(['number' => Member::count(), 'tw' => $tw, 'request' => $req->all()], 200);
//        return view("main.social_buttons", ['number' => Member::count(), 'tw' => $tw]);
    }

    public function all_members() {
        $members = Member::get();
        return view('main.all_members', ['members' => $members]);
    }
}

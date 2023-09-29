<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function __invoke()
    {
        return view('main/index');
    }

    public function step2(Request $req) {
        $request = $req->except('_token');
        $errors = new \Illuminate\Support\MessageBag;

        foreach ($_POST as $key => $value) {
            if ($value === '') {
                $errors->add("$key", "Please enter $key");
            }
        }

        if (strpos($_POST['phone'], "_")) {
            $errors->add('phone', "Enter your phone number in full");
        }

        if (!strpos($_POST['email'], "@")) {
            $errors->add('email', "Please use @ in your email");
        }

        $emailRepeats = Member::where('email', $request['email'])->count();
        $phoneRepeats = Member::where('phone', $request['phone'])->count();

        if ($emailRepeats < 1 or $phoneRepeats < 1) {
            if ($emailRepeats > 0) {
                $errors->add('email', 'This email already exists');
            }

            if ($phoneRepeats > 0) {
                $errors->add('phone', 'This phone number already exists');
            }
        }

        if ($errors->any()) {
            return view('main/index', ['old' => $request])->withErrors($errors);
        }

        Member::where('email', $request['email'])->where('phone', $request['phone'])->delete();
        Member::insert($request);

        return view('main/step2', ['request' => $request]);
    }

    public function social_buttons(Request $req) {
        $request = $req->except('_token');

        if ($req->hasFile('photo') && $req->file('photo')->isValid()) {
            $photoName = uniqid('', true) . '_' . $req->file('photo')->getClientOriginalName();
            $req->file('photo')->storeAs('img', $photoName);
        } else {
            $photoName = '';
        }

        $request['photo'] = $photoName;
        Member::where('email', $request['email'])->where('phone', $request['phone'])->delete();
        Member::insert($request);

        $tw = ['link' => config('link'), 'text' => config('text')];
        return view("main/social_buttons", ['number' => Member::count(), 'tw' => $tw]);
    }

    public function all_members() {
        $members = Member::get();
        return view('main/all_members', ['members' => $members]);
    }
}

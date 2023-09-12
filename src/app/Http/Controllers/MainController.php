<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __invoke()
    {
        if (session_start()) {
            session_destroy();
            session_start();
        }
        return view('main/index', ['error' => '']);
    }

    public function step2(Request $request) {
        if (!isset($request['first_name'])) {
            return View::errorDefine('Main page');
        }

        session_destroy();
        session_start();
        $_SESSION['POST'] = $request;

        foreach ($request as $key => $value) {
            if ($value === '') {
                $key = str_replace("_", " ", $key);
                return view('main/index', ['content' => "Please enter $key"]);
            }
        }

        if (strpos($_POST['phone'], "_")) {
            return view('main/index', ['content' => 'Enter your phone number in full']);
        }

        if (!strpos($_POST['email'], "@")) {
            return view('main/index', ['content' => 'Please use @ in your email']);
        }

        $emailRepeats = Member::find($_POST['email'], 'email')[0][0];
        $phoneRepeats = Member::find($_POST['phone'], 'phone')[0][0];

        echo $emailRepeats;

        if ($emailRepeats < 1 or $phoneRepeats < 1) {
            if ($emailRepeats > 0) {
                return view('main/index', ['content' => 'This email already exists']);
            }

            if ($phoneRepeats > 0) {
                return view('main/index', ['content' => 'This phone number already exists']);
            }
        }

        Member::where('email', $_POST['email'])->where('phone', $_POST['phone'])->delete();

        Member::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'report_subject' => $request->report_subject,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return view('main/step2');
    }

    public function social_buttons() {
        session_start();
        return view('main/social_buttons');
    }

    public function all_members() {
        session_start();
        $members = Member::get();
        return view('main/all_members', ['members' => $members]);
    }
}

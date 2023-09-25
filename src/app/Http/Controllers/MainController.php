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

    public function step2(Request $req) {
        $request = $req->all();

        if (session_start()) {
            session_destroy();
            session_start();
        }

        $_SESSION['POST'] = $request;

        $errors = [];

        foreach ($_POST as $key => $value) {
            if ($value === '') {
                $key = str_replace("_", " ", $key);
                $errors[] = "Please enter $key";
            }
        }

        if (strpos($_POST['phone'], "_")) {
            $errors[] = "Enter your phone number in full";
        }

        if (!strpos($_POST['email'], "@")) {
            $errors[] = "Please use @ in your email";
        }

        $emailRepeats = Member::where('email', $request['email'])->count();
        $phoneRepeats = Member::where('phone', $request['phone'])->count();

        if ($emailRepeats < 1 or $phoneRepeats < 1) {
            if ($emailRepeats > 0) {
                $errors[] = 'This email already exists';
            }

            if ($phoneRepeats > 0) {
                $errors[] = 'This phone number already exists';
            }
        }

        if (!empty($errors)) {
            return view('main/step2', ['errors' => $errors]);
        }

        Member::where('email', $request['email'])->where('phone', $request['phone'])->delete();

        Member::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'report_subject' => $request->report_subject,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return view('main/step2', ['error' => '']);
    }

    public function social_buttons(Request $req) {
        $request = $req->all();

        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public/img/';
            $photo = uniqid('', true) . '_' . $_FILES['photo']['name'];
            $targetFile = $uploadDir . $photo;
            move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile);
        } else {
            $photo = '';
        }

        Member::where('email', $request['email'])->where('phone', $request['phone'])->delete();
//        $this->model->saveForm($_POST, false, $photo);

//        $number = $this->model->recordsNumber();
        $tw = require 'app/config/tw_share.php';
        $vars = [
//            'number' => $number[0][0],
            'tw' => $tw
        ];

        $this->view->render("Social buttons", $vars);
    }

    public function all_members() {
        $members = Member::get();
        return view('main/all_members', ['members' => $members]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function __invoke() {
        return view('main.index', ['request' => null]);
    }

    public function step2(Request $request) {
        return view('main.step2', ['request' => $request['data']]);
    }

    public function social_buttons() {
        $tw = config('tw_share');
        $tw = ['link' => $tw['link'], 'text' => $tw['text']];
        $number = Member::count();
        return view('main.social_buttons', ['data' => ['number' => $number, 'tw' => $tw]]);
    }

    public function submit_form1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:50',
            'birthdate' => 'required|date',
            'report_subject' => 'required|max:150',
            'phone' => 'required|not_regex:/_/',
            'email' => 'required|email|max:70',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $emailRepeats = Member::where('email', $request->email)->exists();
        $phoneRepeats = Member::where('phone', $request->phone)->exists();

        if (is_null($request->company)) {
            if ($emailRepeats) {
                return response()->json(['errors' => ['email' => ['This email already exists']]], 422);
            }
            if ($phoneRepeats) {
                return response()->json(['errors' => ['phone' => ['This phone number already exists']]], 422);
            }
        }

        Member::updateOrCreate(
            ['email' => $request->email, 'phone' => $request->phone],
            $request->all()
        );

        return response()->json(['request' => $request->all()], 200);
    }

    public function submit_form2(Request $req) {
        $request = $req->except('_token');

        if ($req->hasFile('photo') && $req->file('photo')->isValid()) {
            $photoName = uniqid('', true) . '_' . $req->file('photo')->getClientOriginalName();
            $req->file('photo')->storeAs('img', $photoName);
        } else {
            $photoName = '';
        }
        $request['photo'] = $photoName;

        Member::updateOrCreate(
            ['email' => $request['email'], 'phone' => $request['phone']],
            $request
        );

        return response()->json([], 200);
    }

    public function all_members() {
        $paginator = Member::simplePaginate(3);
        $members = $paginator->all();

        return view('main.all_members', ['members' => $members, 'paginator' => $paginator]);
    }
}

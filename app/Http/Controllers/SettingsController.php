<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class SettingsController extends Controller {
	public function change_password() {
		return view('change_password');
	}

	public function password_update(Request $req) {
		$abc = $this->validate($req, [
			'old_pass' => 'required',
			'password' => 'required|min:6|confirmed',
		]);
		$userinfo = User::whereId(Auth::user()->id)->first();
		if (Hash::check($req->old_pass, $userinfo->password)) {
			$userinfo->password = bcrypt($req->password);
			$userinfo->save();
			return redirect()->back()->with('status', 'Password Changed successfully!');
		}
		return redirect()->back()->with('statuserror', 'Your old password is not correct !');

	}

}

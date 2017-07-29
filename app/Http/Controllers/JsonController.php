<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SessionHelper;
use DB;
use FormLogin;

class JsonController extends Controller
{
    //
    public function userCount(Request $request) {
    	$countUsers = count(DB::getInstance()->getUsers());
		$result = ['total' => $countUsers];

		return response($result)->header('Content-Type', 'application/json');
	}

	public function userAvailability(Request $request) {
		// user-availability?email=test@example.com
		$status = 200;
		if (!empty($request->query('email'))) {
			$user = DB::getInstance()->getUserByEmail($request->query('email'));
			$result = [
				'available' => !$user,
			];
		} else {
			$result = [
				'error' => 'Missing email query parameter',
			];
			$status = 400;
		}

		return response($result, $status)->header('Content-Type', 'application/json');
	}
}

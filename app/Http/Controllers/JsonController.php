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

		header('Content-Type: application/json');
		print json_encode($result);
		exit;
	}

	public function userAvailability(Request $request) {
		// user-availability?email=test@example.com
		if (!empty($request->query('email'))) {
			$user = DB::getInstance()->getUserByEmail($request->query('email'));
			$result = [
				'available' => !$user,
			];
		} else {
			$result = [
				'error' => 'Missing email query parameter',
			];
			http_response_code(400);
		}

		header('Content-Type: application/json');
		print json_encode($result);
		exit;
	}
}

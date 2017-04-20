<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanController extends Controller
{
	public function initiate(){
		$result = shell_exec("python " . app_path(). "\http\controllers\scan\scan1.py ");
		dd($result);
	}
}

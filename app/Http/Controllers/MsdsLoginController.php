<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pengguna;

class MsdsLoginController extends Controller
{
	
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $cekuser = Pengguna::where('username', '=' , $username)->count();

        if (Auth::attempt(['username' => $username, 'password' => $password, 'tipe' => 'super'])) {
            return redirect('/home');
        }else{
        	// return redirect('/')
	        // ->with('errors');

        	if ($cekuser > 0)
        	{        		
	            return redirect()->back()
	            ->withInput()
	            ->withErrors([
	                'password' => 'Password salah',
	            ]);
        	}
        	else if ($cekuser == 0){
        		return redirect()->back()
	            ->withInput()
	            ->withErrors([
	                'username' => 'Username salah',
	            ]);
        	}
            
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}

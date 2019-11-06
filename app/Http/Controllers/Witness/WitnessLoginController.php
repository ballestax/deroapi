<?php

namespace App\Http\Controllers\Witness;

use App\Witness;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class WitnessLoginController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
    	$rules = [
            'identification' => 'required',
            'password' => 'required',
        ];

        $this->validate($request, $rules);

        $identification = $request->identification;
        $password = $request->password;

        $witness = Witness::where('identification', $identification)->firstOrFail();

        if($witness->verify($password)){
        	return $this->showOne($witness);
        }else{
        	return response()->json('Wrong credentials', 401);
        }


        
    }
}

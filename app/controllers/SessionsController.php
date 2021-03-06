<?php

class SessionsController extends BaseController{

  public function index(){
    return Auth::user();
  }
  
  public function create(){
		if(Auth::check())
			return Redirect::to('/');
		return View::make('login',['response'=>'']);
	}


	public function store(){
		if(Auth::attempt(Input::only('username','password'))){
			return Redirect::to('/');
		}
		else{

		return View::make('login',['response'=>'Please verify username and password']);
		}
	}


	public function destroy(){
		Auth::logout();
		return Redirect::to('/');
	}
}
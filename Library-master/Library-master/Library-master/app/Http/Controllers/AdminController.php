<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

 function blank(){
    return view('admin1.blank');
 }

  function charts(){
    return view('admin1.charts');
 }

 function forgot_password(){
    return view('admin1.forgot-password');
 }

 function index(){
    return view('admin1.index');
 }

  function login(){
     return view('admin1.login');
  }

  function register(){
     return view('admin1.register');
  }

  function tables(){
     return view('admin1.tables');
  }

  function f404(){
     return view('admin1.404');
  }





}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lab;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


class MailController extends Controller
{
    public function index(){
        $labs = Lab::all();
        return view('main');
    }
    public function store(Request $request){
        $labs = new Lab();

            $labs->name=$request->name;
            $labs->surname=$request->surname;
            $labs->email=$request->email;
            $labs->image=$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/', $labs->image);
            // $labs->move('public/images/', $request->image);
            $labs->save();
        return view('main');

    }
    public function send(){
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = '190103017';
        $objDemo->receiver = '190103017';
        Mail::to("190103017@stu.sdu.edu.kz")->send(new DemoEmail($objDemo));
    }
}

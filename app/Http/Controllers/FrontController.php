<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function StoreNewslater(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:newsletters|max:55',
        ]);

        $data = array();
        $data['email'] = $request->email;
        DB::table('newsletters')->insert($data);
        $notification = array(
            'messege' => 'Thanks for Subscribing',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function OrderTraking(Request $request)
    {
        $code = $request->code;

        $track = DB::table('orders')->where('status_code', $code)->first();
        if ($track) {

            // echo "<pre>";
            // print_r($track);
            return view('pages.tracking', compact('track'));

        } else {
            $notification = array(
                'messege' => 'Status Code Invalid',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);

        }

    }

}

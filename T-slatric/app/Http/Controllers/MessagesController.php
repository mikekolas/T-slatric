<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function submit(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required'
      ]);

      // Create the new message
      $message = new Message;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->subject = $request->input('subject');
      $message->message = $request->input('message');

      //save the new message to the database
      $message->save();
      //Redirect with a success message
      return redirect()->back()->with('success', 'Your message was sent successfully, thanks!');
    }
}

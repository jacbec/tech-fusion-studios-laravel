<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

use App\Mail\Contact;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Mail\Mailer  $mailer
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request, Mailer $mailer)
    {
        $this->validate($request, [
            'name' => 'required|min:3', /*|regex: ^(?!\S*(?:\s\S*){5})([a-zA-Z\'\s]+)$*/
            'email' => 'required|email',
            'reason' => 'required|min:4|max:100',
            'msg' => 'required',
        ]);

        $mailer
            ->to('contact@techfusionstudios.com')
            ->send(new Contact($request->input('name'), $request->input('email'), $request->input('reason'), $request->input('msg')));

        return redirect()->back()->with('alert-success', 'Your email was sent successfully. We will get back to you as soon as possible');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

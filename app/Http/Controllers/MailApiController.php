<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MailResource;
use App\Models\Mail;
use App\Jobs\SendEmailJob;


class MailApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MailResource::collection(Mail::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData =$request->all();

        $mail = Mail::create($postData);

        dispatch(new \App\Jobs\SendEmailJob($mail));

        return response()->json(['status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
        return new MailResource($mail);
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
    public function destroy(Mail $mail)
    {
        $mail->delete();

        return response()->json(['status'=>'success']);

    }
}

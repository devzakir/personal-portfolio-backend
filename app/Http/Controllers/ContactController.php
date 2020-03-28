<?php

namespace App\Http\Controllers;

use Session;
use App\Contact;
use Illuminate\Http\Request;
// use App\Mail\ContactEmail;
// use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::orderBy('status', 'asc')->paginate(20);
        return view('admin.contact.index')->with('contacts', $contact);
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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email', 
            'subject' => 'required|string', 
            'message' => 'required|min:20',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        Session::flash('success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'name' => 'status',
        ]);

        $contact->status = $request->status;
        $contact->save();

        Session::flash('success', 'Message status updated successfully');
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if($contact){
            $contact->delete();

            Session::flash('succes', 'Contact Message Deleted Successfully');
        }

        return redirect()->back();
    }

    public function mark_as_read(Request $request,$id){
        $contact = Contact::find($id);

        $contact->read = $request->mark_as_read();
        $contact->save();
    }

    public function send(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email', 
            'subject' => 'required', 
            'message' => 'required',
        ]);
        
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Mail::to('web.zakirbd@gmail.com')->send(new ContactEmail($contact->name, $contact->email, $contact->subject, $contact->message));

        return response()->json('Contact message send successfully', 200);
    }
}

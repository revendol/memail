<?php

namespace Radoan\Memail\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Radoan\Memail\Models\EmailTemplate;

class EmailTemplateController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = EmailTemplate::paginate(15);
        return view('memail.templates',compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memail.create-template');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'subject' => 'required:min:3',
            'contents' => 'required|min:10'
        ]);
//        dd($request->all());
        $data = [
            'name'=>$request->name,
            'subject'=>$request->subject,
            'content'=>$request->contents,
            'macros'=>$request->macros
        ];

        $emailTemplate = EmailTemplate::create($data);
        if($emailTemplate)
        {
            return redirect()->route('memail.email-template.index');
        }
        return abort(500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $template = EmailTemplate::where('id',$id)->firstOrFail();
        return view('memail.show-template',compact('template'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function raw($id)
    {
        $template = EmailTemplate::where('id',$id)->firstOrFail();
        return $template->content;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = EmailTemplate::where('id',$id)->firstOrFail();
        return view('memail.edit-template',compact('template'));
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
        $this->validate($request,[
            'name' => 'required|min:3',
            'subject' => 'required:min:3',
            'contents' => 'required|min:10'
        ]);
        $template = EmailTemplate::where('id',$id)->firstOrFail();
        $template->name = $request->name;
        $template->subject = $request->subject;
        $template->content = $request->contents;
        $template->macros = $request->macros;
        $template->save();
        return back()->with('success','Email template was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmailTemplate::where('id',$id)->delete();
        return redirect()->route('memail.email-template.index');
    }
}

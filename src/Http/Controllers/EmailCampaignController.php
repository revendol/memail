<?php

namespace Radoan\Memail\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Radoan\Memail\Models\EmailCampaign;
use Radoan\Memail\Models\EmailTemplate;

class EmailCampaignController extends Controller
{
    public function index()
    {
        $campaigns = EmailCampaign::with('template')->get();
        return view('memail.index',compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = EmailTemplate::select('id','name')->get();
        return view('memail.create-campaign',compact('templates'));
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
            'title'=>'required|alpha_dash|min:5',
            'template_id'=>'required'
        ]);
        $emailCampaign = EmailCampaign::create(['title'=>$request->title,'template_id'=>$request->template_id]);
        if($emailCampaign)
        {
            return redirect()->route('memail.email-campaign.index');
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
        $campaign = EmailCampaign::where('id',$id)->firstOrFail();
        return view('memail.show-campaign',compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $templates = EmailTemplate::select('id','name')->get();
        $campaign = EmailCampaign::where('id',$id)->firstOrFail();
        return view('memail.edit-campaign',compact('campaign','templates'));
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
        $campaign = EmailCampaign::where('id',$id)->firstOrFail();
        $this->validate($request,[
            'template_id'=>'required'
        ]);
        $campaign->template_id = $request->template_id;
        $campaign->save();
        return back()->with('success','Email campaign was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmailCampaign::where('id',$id)->delete();
        return redirect()->route('memail.email-campaign.index');
    }
}

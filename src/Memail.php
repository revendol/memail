<?php

namespace Radoan\Memail;

use Illuminate\Support\Facades\Mail;
use Radoan\Memail\Mail\MasterMail;
use Radoan\Memail\Models\EmailCampaign;

class Memail{
    public static function send($to,$campaign,$data){
        $attachments = [];
        $options = [];
        $campaign = EmailCampaign::where('title',$campaign)->firstOrFail();
        $template = $campaign->template;
        $body = $template->content;
//        $data = [],$attachments = [], $options = []
        if(isset($data['data'])){
            foreach ($data['data'] as $key => $datum){
                $body = str_replace('{{'.$key.'}}',$datum,$body);
            }
        }
        if(isset($data['attachments'])){
            $attachments = $data['attachments'];
        }
        if (isset($data['options'])){
            $options = $data['options'];
        }
        if($template){
            $mail = new MasterMail($template, $body,$attachments);
            $email = Mail::to($to);
            if(isset($options['cc'])){
                $email->cc($options['cc']);
            }
            if(isset($options['bcc'])){
                $email->bcc($options['bcc']);
            }
            if(isset($options['queue'])){
                $email->queue($mail);
            }
            if(isset($options['later'])){
                $email->later($options['later'],$mail);
            }
            $email->send($mail);
        }
        return $email;
    }
}

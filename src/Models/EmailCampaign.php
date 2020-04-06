<?php

namespace Radoan\Memail\Models;

use Illuminate\Database\Eloquent\Model;

class EmailCampaign extends Model
{
    protected $table = 'email_campaigns';

    protected $fillable = ['title','template_id',];

    public function template()
    {
        return $this->belongsTo(EmailTemplate::class);
    }
}

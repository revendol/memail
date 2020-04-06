<?php

namespace Radoan\Memail\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $table = 'email_templates';

    protected $fillable = ['name','subject','content','target_email','macros','notification_type'];

    public function template()
    {
        return $this->hasMany(EmailCampaign::class);
    }
}

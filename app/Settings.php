<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'website_logo', 'dashboard_logo', 'email', 'mobile', 'address', 'facebook_link', 'twitter_link', 'instagram_link', 'public_key', 'tx_ref', 'amount', 'FACEBOOK_CLINET_ID', 'FACEBOOK_CLINET_SECRET', 'GMAIL_CLINET_ID', 'GMAIL_CLINET_SECRET', 'TWITTER_CLINET_ID', 'TWITTER_CLINET_SECRET'
    ];
}

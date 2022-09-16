<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $emailConfig = DB::table('smtp')->first();

        if ($emailConfig) {
            $config = array(
                'driver'     => $emailConfig->email_driver,
                'host'       => $emailConfig->email_host,
                'port'       => $emailConfig->email_port,
                'username'   => $emailConfig->email_user,
                'password'   => $emailConfig->email_pass,
                'encryption' => $emailConfig->email_encryption,
                'from'       => array('address' => $emailConfig->email_from, 'name' => $emailConfig->email_from_name),
                'sendmail'   => '/usr/sbin/sendmail -bs',
                'pretend'    => false,
            );

            Config::set('mail', $config);
        }
    }
}

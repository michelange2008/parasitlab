<?php namespace App\Providers;

use Log;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\SyslogUdpHandler;
use Illuminate\Support\ServiceProvider;

class PaperTrailServiceProvider extends ServiceProvider {

    /**
     * Register Papertrail Service Provider
     *
     * @return void
     */
    public function register()
    {
        $monolog = Log::getLogger();
        $syslogHandler = new SyslogUdpHandler("logs2.papertrailapp.com", '14408');

        $formatter = new LineFormatter('%channel%.%level_name%: %message% %extra%');
        $syslogHandler->setFormatter($formatter);

        $monolog->pushHandler($syslogHandler);
    }
}

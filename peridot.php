<?php
use Evenement\EventEmitterInterface;
use Peridot\Plugin\Watcher\WatcherPlugin;
use Peridot\Reporter\Dot\DotReporterPlugin;
use Peridot\Reporter\ListReporter\ListReporterPlugin;

return function(EventEmitterInterface $emitter) {
    $watcher = new WatcherPlugin($emitter);
    $watcher->track(__DIR__ . '/src');

    $dot = new DotReporterPlugin($emitter);
    $list = new ListReporterPlugin($emitter);

    $debug = getenv('DEBUG');

    if ($debug) {
        $emitter->on('error', function ($number, $message, $file, $line) {
            print "Error: $number - $message:$file:$line\n";
        });
    }
};

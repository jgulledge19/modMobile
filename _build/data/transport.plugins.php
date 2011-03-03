<?php
$plugins = array();

$plugins[0] = $modx->newObject('modPlugin');
$plugins[0]->set('id', 0);
$plugins[0]->set('name', 'modMobile');
$plugins[0]->set('description', 'Render mobile template for mobile devices');
$plugins[0]->set('plugincode', file_get_contents($sources['source_core'].'/elements/plugins/modmobile.plugin.php'));

/* add plugin events */
$events = include $sources['data'].'transport.plugins.events.php';
if (is_array($events) && !empty($events)) {
    $plugins[0]->addMany($events);
    $modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events.'); flush();
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events!');
}
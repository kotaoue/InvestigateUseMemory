<?php

namespace main;

$usage['current'] = memory_get_usage();    
logging($usage, 'initialize usage.');

require_once('empty.php');
logging($usage, 'require empty.php.');

require_once('hoge.php');
logging($usage, 'require hoge.php.');
\hoge\getName().PHP_EOL;

use hoge as piyo;
logging($usage, 'set alias.');
piyo\getName().PHP_EOL;

function logging(array &$usages, string $tag = ''): void {
    $usages['before'] = $usages['current'];
    $usages['current'] = memory_get_usage();
    echo sprintf('usage memory %4d. %s'.PHP_EOL, ($usages['current'] - $usages['before']), $tag);
}

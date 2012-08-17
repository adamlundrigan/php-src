--TEST--
Bug #62561 (DateTime object created using UNIX timestamp and non-UTC timezone advances 25 hours when P1D DateInterval is added)
--INI--
date.timezone=America/New_York
--FILE--
<?php
$ts = new DateTime('@1341115200', new DateTimeZone('America/New_York'));

$dayFromTs = new DateTime('@1341115200', new DateTimeZone('America/New_York'));
$dayFromTs->add(new DateInterval('P1D'));

echo 'ts: '.$ts->format('Y-m-d H:i:s')."\n";
echo 'ts + P1D: '.$dayFromTs->format('Y-m-d H:i:s')."\n";
?>
--EXPECT--
ts: 2012-07-01 04:00:00
ts + P1D: 2012-07-02 04:00:00

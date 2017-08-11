--TEST--
readline_callback_handler_install(): verify callback handler installs function
--STDIN--
FOO
--SKIPIF--
<?php if (!extension_loaded("readline")) die("skip"); ?>
--FILE--
<?php

function test_callback($ret)
{
	var_dump($ret);
	readline_callback_handler_remove();
}

readline_callback_handler_install("WHO? ", 'test_callback');

#$n = stream_select($r = array(STDIN), $w, $e, null);
readline_callback_read_char();

?>
--EXPECT--
WHO? FOO
string(3) "FOO"

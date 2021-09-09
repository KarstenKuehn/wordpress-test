<?php

/*
 * cookie-upgrade.php
 *
 * @version 1.1
 * @copyright Copyright (c) etracker GmbH.
 */

function bad_request($status)
{
	header("${_SERVER['SERVER_PROTOCOL']} 400 Bad Request");
	header('Content-Type: text/plain; charset=UTF-8');
	exit($status);
}

header('Cache-Control: no-cache');

$cookie_name = @$_GET['cookie_name'];
if (!is_string($cookie_name) || $cookie_name === '')
{
	bad_request('cookie_name invalid or not specified');
}

$expires = @$_GET['expires'];
if (!is_numeric($expires) || ($expires = (int)$expires) < 0)
{
	bad_request('expires timestamp invalid or not specified');
}

$domain = @$_GET['domain'];
if ($domain !== null && !is_string($domain))
{
	bad_request('domain invalid');
}

$cookie_value = @$_COOKIE[$cookie_name];

if (version_compare('7.3.0', phpversion()) == 1) {
	// no support for SameSite prior to 7.3.0
	setcookie($cookie_name, $cookie_value, $expires, null, $domain);
}
else {
	setcookie($cookie_name, $cookie_value, [
		'expires' => $expires,
		'domain' => $domain,
		'samesite' => 'Lax'
	]);
}

header("${_SERVER['SERVER_PROTOCOL']} 204 No Content");
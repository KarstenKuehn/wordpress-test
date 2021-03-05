<?php

$post_ID = 4;

$empfaenger = 'waldemar.schneider@bluesummit.de';
$betreff = 'Page wurde verändert '.$post_ID;
$nachricht = 'no message';
$header = 'From: wordpress@bluesummit.de' . "\r\n" .
    'Reply-To: wordpress@bluesummit.de' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($empfaenger, $betreff, $nachricht, $header);

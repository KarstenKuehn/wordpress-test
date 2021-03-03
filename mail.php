<?php

$post_ID = 4;

$empfaenger = 'seo-cron@bluesummit.de';
$betreff = 'Page wurde verändert '.$post_ID;
$nachricht = 'no message';
$header = 'From: wordpress@lottobayern.bluesummit.de' . "\r\n" .
    'Reply-To: wordpress@lottobayern.bluesummit.de' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($empfaenger, $betreff, $nachricht, $header);

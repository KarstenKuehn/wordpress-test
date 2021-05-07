<?php
    $filename = "backup.sql";

    $command = "mysqldump  --no-tablespaces --user=lottobay --password='clPNxfwL!LSYIFmNgk!E71EyoFBC-ENB' --host=localhost lottobayern  > ~/" . $filename;

    $returnVar 	= NULL;
    $output 	= NULL;

    exec($command, $output, $returnVar);
?>

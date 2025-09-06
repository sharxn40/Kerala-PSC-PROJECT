<?php
session_start();
session_destroy();
header("Location: kerala_psc_index.php");
exit();
?> 
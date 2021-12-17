<?php

header('Content-Type: image/jpg');
readfile("../storage/" . $_GET['asset']);
die();
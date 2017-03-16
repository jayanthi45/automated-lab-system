<?php
session_start();
session_destroy();
header("Location: faculty_main.html");
?>
<?php
session_start();
session_destroy();
header("location: /AdminPage/AdminLogin.php");


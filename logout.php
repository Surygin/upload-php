<?php

session_start();
unset($_SESSION);
header('Location:form_login.php');
<?php
   if(isset($_SESSION['login_user'])){
       unset($_SESSION['login_user']);
       unset($_SESSION['pic']);
   }
   header("Location: test.php")
   ?>
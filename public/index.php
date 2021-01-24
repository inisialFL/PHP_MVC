<?php  
if( !session_id() ) session_start();

//untuk memanggil file init yang ada di dalam folder app
//init, yaitu file yang akan memanggil semua file yang kita butuhkan, teknik ini disebut bootstraping
//bootstraping, yaitu memanggil satu file dan file tersebut akan memanggil seluruh aplikasi mvc
require_once '../app/init.php';

//instance class App
//menjalankan class App
$app = new App;
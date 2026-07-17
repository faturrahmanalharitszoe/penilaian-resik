<?PHP
//
$usex="root";
$pasx="";
$datx="resik";
$hosx="localhost";
//
$hanx = MySQL_PCONNECT($hosx,$usex,$pasx) or DIE("Could Not Connect database, Error : ".MySQL_ERROR());
$conx = MySQL_SELECT_DB($datx,$hanx) or DIE("Cannot Select datxbase, Error : ".MySQL_ERROR());
//
?>

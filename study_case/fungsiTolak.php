<?php
require 'function.php';

$no = $_GET["no"];

if( tolak($no) > 0) {
    echo "<script> 
     alert('Data di tolak!');
     document.location.href = 'managerProyek.php';
     </script>";
} else {
    echo "<script> 
     alert('Data disetujui');
     document.location.href = 'managerProyek.php';
     </script>";
}
?>
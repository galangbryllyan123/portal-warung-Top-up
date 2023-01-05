<?php
session_start();
unset($_SESSION['username']);
$loginUrl = '/';
print('<script> top.location.href=\'' . $loginUrl . '\'</script>');
?>

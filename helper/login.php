<?php
include_once("../non-pages/php-include/top.php");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['msg'] = '';
    if ($publisherID = getIdByInfo('username', $_POST['username'], 'users')) {

        if (getInfoByID($publisherID, 'users', 'password') != $_POST['password']) {
            $_SESSION['msg'] .= 'User name and password do not match!';
            $_SESSION['msg'] .= '<br>';
        } else {
            $_SESSION['publisher'] = getRowByID($publisherID, 'users');
            $_SESSION['msg'] .= 'Successfully Logged In!';
            $_SESSION['msg'] .= '<br>';
            header("location:" . $upFolderPlaceholder . "app/publisher/index.php");
            return;
        }

    } else {
        $_SESSION['msg'] .= 'Invalid User name and password!';
        $_SESSION['msg'] .= '<br>';
    }
}
header("location:" . $upFolderPlaceholder . "public/login.php");

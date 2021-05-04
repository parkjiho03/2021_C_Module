<?php
use src\App\{DB, Session};

function filesUpload($files)
{
    $imgs = [];
    foreach ($files['name'] as $f => $name) {
        if (trim($name) == "") {
            return;
        }
        $filename = time() . "_" . $name;
        $file_ext = strrev(explode(".", strrev($filename))[0]);
        if (!in_array($file_ext, ["png", "jpg", "gif"])) {
            back("이미지는 png, jpg, gif 형식만 가능합니다.");
        } 
        array_push($imgs, $filename);
        move_uploaded_file($files['tmp_name'][$f], __NIMGS . __DS . $filename);
    }
    return $imgs;
}

function fileRemove($file)
{
    if (file_exists(__NIMGS . __DS . $file)) {
        unlink(__NIMGS . __DS . $file);
    }
}

function view($pageUrl, $datas = [])
{
    extract($datas);

    require_once __VIEWS . __DS . "template/header.php";
    require_once __VIEWS . __DS . $pageUrl . ".php";
    require_once __VIEWS . __DS . "template/footer.php";
}

function session()
{
    return new Session();
}

function user()
{
    return session()->get("user", true, true);
}

function redirect($url, $msg, $type = "msg")
{
    session()->set($type, $msg);
    header("Location:$url");
    exit;
}

function back($msg, $type = "error")
{
    session()->set($type, $msg);
    echo "<script>history.back();</script>";
    exit;
}

function arrayMsg($msg, $type = "arrayError")
{
    session()->set($type, $msg);
    echo "<script>history.back();</script>";
    exit;
}

function output($str)
{
    return nl2br(str_replace(' ', '&nbsp;', htmlentities($str)));
}

function returnJSON($obj)
{
    echo json_encode($obj, JSON_UNESCAPED_UNICODE);
    exit;
}

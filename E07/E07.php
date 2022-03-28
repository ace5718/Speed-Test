<?php
session_start();
if (isset($_SESSION['json']) && $_SESSION['json'] != "") {
    $_SESSION['json'] = '';
}

function xmltojson($source)
{
    if (is_file($source)) {
        $xml_array = simplexml_load_file($source);
    } else {
        $xml_array = simplexml_load_string($source);
    }
    $json = json_encode($xml_array);
    return $json;
}
if (count($_POST) > 0) {
    $xml = $_POST['xml'];
    $json = xmltojson($xml);
    $_SESSION['json'] = $json;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        textarea {
            height: 400px;
            width: 200px;
        }
    </style>
</head>

<body>
    <form method="post">
        <textarea name="xml" id="">
<humans>
<zhangying>
<name>abc</name>
<sex>def</sex>
<old>26</old>
</zhangying>
<tank>
<name>tank</name>
<sex>
<hao>yes</hao>
<aaaa>no</aaaa>
</sex>
<old>26</old>
</tank>
</humans>
        </textarea>
        <textarea name="json" id=""><?php echo isset($_SESSION['json']) ? $_SESSION['json']  : '' ?></textarea>
        <br>
        <button type="submit">Convert</button>
    </form>
</body>

</html>
<!-- 
<humans>
<zhangying>
<name>abc</name>
<sex>def</sex>
<old>26</old>
</zhangying>
<tank>
<name>tank</name>
<sex>
<hao>yes</hao>
<aaaa>no</aaaa>
</sex>
<old>26</old>
</tank>
</humans> -->
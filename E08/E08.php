<?php
$input = file_get_contents('data.json');

if ($input) {
    $input = json_decode($input, true);
    $datas = [];
    $temp = [];
    for ($i = 0; $i < count($input); $i++) {
        $temp[] = $input[$i];
        if (count($temp) == 5) {
            $datas[] = $temp;
            $temp = [];
        }
    }
    if (count($temp) > 0) {
        $datas[] = $temp;
    }

    $page = !isset($_GET['page']) ? 1 : $_GET['page'];
    $data = $datas[$page - 1];

    $st = $page - 2;
    $ed = $page + 2;
    if ($st <= 0) {
        $st = 1;
        $ed = 5;
    } else if ($ed >= count($datas)) {
        $ed = count($datas);
        $st = $ed - 4;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="main">
        <?php foreach ($data as $d) { ?>
            <?= $d['title'] ?>
        <?php } ?>
    </div>

    <a href="?page=<?= $_GET['page'] - 1 > 0 ? $_GET['page'] - 1 : 1 ?>">
        <</a> <?php for ($i = $st; $i <= $ed; $i++) { ?> <a type="button" href="?page=<?= $i ?>"><?= $i ?>
    </a>
<?php } ?>

<a href="?page=<?=
                    isset($_GET['page']) ? ($_GET['page'] + 1 < count($datas) ? $_GET['page'] + 1 : count($datas)) : 2
                ?>">></a>
</body>

</html>
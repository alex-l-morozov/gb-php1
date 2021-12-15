<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculator 2</title>
</head>
<body>
<?php
$c = "";
$a = (isset($_GET['a'])) ? intval($_GET['a']) : 5;
$b = (isset($_GET['b'])) ? intval($_GET['b']) : 5;
$action = (isset($_GET['action'])) ? $_GET['action'] : '+';
switch ($action) {
    case '+':
        $c = $a + $b;
        break;
    case '-':
        $c = $a - $b;
        break;
    case '*':
        $c = $a * $b;
        break;
    case '/':
        $c = '&#8734;';
        if ($b != 0) $c = $a / $b;
        break;
}
?>
<form>
    <label>A:</label>
    <input name="a" type="number" style="width: 50px" value="<?=$a;?>"><br />
    <label>B:</label>
    <input name="b" type="number" style="width: 50px" value="<?=$b;?>">
    <div>
        <input type="submit" name="action" value="+">
        <input type="submit" name="action" value="-">
        <input type="submit" name="action" value="*">
        <input type="submit" name="action" value="/">
    </div>
</form>
<div><strong>Результат: <?=$c;?></strong></div>
</body>
</html>
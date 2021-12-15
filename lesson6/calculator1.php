<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculator 1</title>
</head>
<body>
<?php
$c = "";
$a = (isset($_GET['a'])) ? intval($_GET['a']) : 5;
$b = (isset($_GET['b'])) ? intval($_GET['b']) : 5;
$action = (isset($_GET['action'])) ? htmlspecialchars($_GET['action']) : 'plus';

switch ($action) {
    case 'plus':
        $c = $a + $b;
        break;
    case 'minus':
        $c = $a - $b;
        break;
    case 'pow':
        $c = $a * $b;
        break;
    case 'div':
        $c = '&#8734;';
        if ($b != 0) $c = $a / $b;
        break;
}
?>
<form>
    <input name="a" type="number" style="width: 50px" value="<?=$a;?>">
    <select name="action" style="width: 40px">
        <option <?php echo ($action == 'plus') ? "selected" : "";?> value="plus">+</option>
        <option <?php echo ($action=='minus') ? "selected" : "";?> value="minus">-</option>
        <option <?php echo ($action=='pow') ? "selected" : "";?> value="pow">*</option>
        <option <?php echo ($action=='div') ? "selected" : "";?> value="div">/</option>
    </select>
    <input name="b" type="number" style="width: 50px" value="<?=$b;?>">
    <input type="submit" value="=" style="width: 30px">
    <b><?=$c?></b>
</form>
</body>
</html>
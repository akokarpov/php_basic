<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">Главная</a>
&nbsp;
<a href="#">Калькулятор</a>
&nbsp;
<a href="feedback.php">Отзывы</a><br><br>
    <p><strong>Калькулятор версия 1</strong></p>
    <form action="server.php?action=calc1" method="post">
        <input style="width:30px" type="number" min="-1000" max="1000" name="first" value=<?php if($_GET['first']){echo "{$_GET['first']}";}?>>
        <select name="operation">
            <option value="add" <?php if($_GET['operation'] == 'add'){echo "selected";}?>>+</option>
            <option value="sub" <?php if($_GET['operation'] == 'sub'){echo "selected";}?>>–</option>
            <option value="mul" <?php if($_GET['operation'] == 'mul'){echo "selected";}?>>*</option>
            <option value="div" <?php if($_GET['operation'] == 'div'){echo "selected";}?>>/</option>
        </select>
        <input style="width:30px" type="number" min="-1000" max="1000" name="second" value=<?php if($_GET['second']){echo "{$_GET['second']}";}?>>
        <input type="submit" value='='>
        <?php if($_GET['res']){echo $_GET['res'];}?>
    </form>
    <br>
    <p><strong>Калькулятор версия 2</strong></p>
    <form action="server.php?action=calc2" method="post">
        <input style="width:30px" type="number" min="-1000" max="1000" name="first" value=<?php if($_GET['first']){echo "{$_GET['first']}";}?>>
        <?php

        if($_GET['operation']) {
            switch ($_GET['operation']) {
                case 'add':
                    echo '+';
                    break;
                
                case 'sub':
                    echo '–';
                    break;
                
                case 'mul':
                    echo '*';
                    break;
                
                case 'div':
                    echo '/';
                    break;
            }
        } else {
            echo '&nbsp;';
        }
        ?>
        <input style="width:30px" type="number" min="-1000" max="1000" name="second" value=<?php if($_GET['second']){echo "{$_GET['second']}";}?>>
        =
        <?php if($_GET['res']){echo $_GET['res'];}?>
        <br><br>
        <button type='submit' name='operation' value='add'>+</button>
        <button type='submit' name='operation' value='sub'>-</button>
        <button type='submit' name='operation' value='mul'>*</button>
        <button type='submit' name='operation' value='div'>/</button>
    </form>
</body>
</html>
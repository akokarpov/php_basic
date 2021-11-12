<?php
    $h1 = '<h1>This is H1 heading...</h1>';
    $title = '<title>Document Name from PHP</title>';
    $name = "GeekBrains user";
    $todaysYear = date("Y");
    define('MY_CONST', 100);
    $a = 1;
    $b = 2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo "$title"
    ?>
</head>
<body>

<?php
    echo "$h1";
    echo "Hello, $name!";
    echo "<br>";
    echo MY_CONST;
    echo "<br>";
    echo "\\<br>";
    echo "Текущий год: $todaysYear.<br>";
    echo "This is \$a before change: $a. <br>";
    echo "This is \$b before change: $b. <br>";
    $a = $a + $b;
    $b = $b - $a;
    $b = -$b;
    $a = $a - $b;
    echo "This is \$a after change: $a. <br>";
    echo "This is \$b after change: $b. <br>";
?>

</body>
</html>
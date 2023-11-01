<!DOCTYPE html>
<html>
<head>
    <title>Конвертер систем числення</title>
</head>
<body>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="number">Число:</label><br>
        <input type="text" id="number" name="number"><br>
        <label for="base">Система числення:</label><br>
        <select id="base" name="base">
            <option value="binary">Двійкова</option>
            <option value="decimal">Десяткова</option>
            <option value="hexadecimal">Шістнадцятирічна</option>
        </select><br>
        <input type="submit" value="Конвертувати">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['number']) && isset($_GET['base'])) {
            $number = $_GET['number'];
            $base = $_GET['base'];

            switch ($base) {
                case 'binary':
                    $convertedNumber = decbin($number);
                    break;
                case 'decimal':
                    $convertedNumber = $number;
                    break;
                case 'hexadecimal':
                    $convertedNumber = dechex($number);
                    break;
                default:
                    echo "Невідома система числення. Будь ласка, виберіть 'binary', 'decimal' або 'hexadecimal'.";
                    exit();
            }

            echo "<p>Число {$number} в системі числення {$base} є {$convertedNumber}.</p>";
        }
    }
    ?>
</body>
</html>

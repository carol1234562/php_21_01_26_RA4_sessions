<?php
if (!isset($_SESSION['numbers'])) {
    $_SESSION['numbers'] = [10,20,30];
}
if (isset($_POST['modify'])) {
    $position = $_POST['position'];
    $value = $_POST['value'];
    if (isset($_SESSION['numbers'][$position])) {
        $_SESSION['numbers'][$position] = $value;
    }
}
if (isset($_POST['average'])) {
    $average = array_sum($_SESSION['numbers']) / count($_SESSION['numbers']);
}
?>
    
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Modify array saved in session</title>
</head>

<body>
    <h1>Modify array saved in session</h1>
    <form action="Ejercicio1.php" method="post">
        <label for="position"> Position to modify</label>
        <select name="position" id="position">
            <?php for ($i = 0; $i < count(value: $_SESSION['numbers']); $i++) { ?>
                <option value="<?php echo $i; ?>">
                    <?php echo $i; ?> </option>
            <?php
            } ?>
        </select>
        <br><br>

        <label for="value"> New value</label>

        <input type="number" id="value" name="value">
        <br><br>

        <input type="submit" value="Modify" name="modify">
        <input type="submit" value="Average" name="average">
        <input type="reset" value="reset">
    </form>

    <p>Current array: 
        <?php echo implode(', ', $_SESSION['numbers']); ?>
    </p>
    <?php 
    if (isset($average)) {
        echo "<p> Average: " . $average . "</p>";
    } ?>

</body>
</html>

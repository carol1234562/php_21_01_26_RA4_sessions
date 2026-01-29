<?php
//datos fijos 
if (!isset($_SESSION['numbers'])) {
    //datos de nuestro array
    $_SESSION['numbers'] = [10, 20, 30];
}
//rececpciona el boton presionado por mi usuario 
if (isset($_POST['modify'])) {
    //posicion del array escogida por el usuario 
    //recordar que las posiciones empiezan del 0 en adelante 
    //es decir que posicion 0 es 10 y posicion 2 es 30 
    $position = $_POST['position'];
    //valor ingresado por nuestro usuario 
    $value = $_POST['value'];
    //nos aseguramos de la posicion 
    //siempre es bueno una confirmacion
    if (isset($_SESSION['numbers'][$position])) {
        $_SESSION['numbers'][$position] = $value;
    }
}
//verificacion boton average 
if (isset($_POST['average'])) {
    //array_sum= suma nuestros valores del array
    $average = array_sum($_SESSION['numbers'])
        //obtenemos cantidad de elementos del array
        / count($_SESSION['numbers']);
    //luego calculamos promedio 
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
            <?php
            for ($i = 0; $i < count(value: $_SESSION['numbers']); $i++) {
            ?>
                <option value=" <?php echo $i; ?>">
                    <?php echo $i; ?> </option>
            <?php
            } ?>
        </select>
        <br><br>

        <label for="value"> New value</label>

        <input type="number" id="value" name="value">
        <br><br>
        /*botones*/
        <input type="submit" value="Modify" name="modify">
        <input type="submit" value="Average" name="average">
        <input type="reset" value="reset">
    </form>

    <p>Current array:
        <?php
        echo implode(
            ', ',
            $_SESSION['numbers']
        ); ?>
    </p>
    <?php
    if (isset($average)) {
        //printa average 
        echo "<p> Average: " . $average . "</p>";
    } ?>

</body>

</html>
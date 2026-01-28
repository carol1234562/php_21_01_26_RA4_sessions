  
<!DOCTYPE html>    
    <html>  
        <head>
            <meta charset="UTF-8">
            <title>Modify array saved in session</title>
        </head>
        <body>
            <h1>Modify array saved in session</h1>
            <form action="ejercicio1" method="post">
                <label for="position"> Position to modify</label>
                <select for="position" name ="position" >
                    <?php for ($i = 0; $i < count (value : $SESSION ['numbers']); $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i;?> </option>
                    <?php } ?>
                </select><br><br>
                <label for="value"> New value</label>
                <input type="number" id= "value" name="value"><br><br>
                <input type="submit" value="Modify" name="modify">
                <input type="submit" value="Average" name="Average">
                <input type="reset" value="reset">
            </form>
                <p>Current array : <?php echo implode(', ', $_SESSION['numbers']); ?></p>
                <?php if (isset($average)) { 
                    echo "<p> Average: " . $average . "</p>";
                   } ?>
                   
        </body>
    </html>
</html

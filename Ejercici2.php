 <?php
    session_start();
    //datos fijos 
    if (!isset($_SESSION['drinks'])) {
        //datos de nuestro array
        //especificamos valores
        $_SESSION['drinks'] = [
            'Milk' => 10,
            'Soft Milk' => 10
        ];
    }
    if (isset($_POST['name'])) {
        $_SESSION['worker'] = $_POST['name'];
    }

    if (isset($_POST['add'])) {
        //declaramos 
        $product = $_POST['position'];
        //necesariamente un int 
        $quantity = (int)$_POST['product'];
        //valor nunca negativo 
        if ($quantity > 0) {
            //sumemos
            $_SESSION['drinks'][$product] += $quantity;
        } else {
            echo 'Error, volver a ingresar valor. ';
        }
    }

    if (isset($_POST['remove'])) {
        $product = $_POST['position'];
        $quantity = (int)$_POST['product'];
        //comparamos la cantidad 
        //en caso de ser negativo mandamos error 
        //tener en cuenta que $quantity es una variable 
        // y que nuestro stock es un string ($product)
        if ($quantity > $_SESSION['drinks'][$product]) {
            echo 'Error, volver a ingresar valor. ';
        } else {
            $_SESSION['drinks'][$product] -= $quantity;
        }
    }

    if (isset($_POST['reset'])) {
        //destruye todos los datos vinculados con la sesion actual. 
        session_destroy();
        //redirige la sesion a la pagina indicada 
        //en este caso la misma. 
        header("Location:  Ejercici2.php");
        exit;
    }
    ?>

 <!DOCTYPE html>

 <head>
     <meta charset="UTF-8">
     <title>Modify array </title>
 </head>

 <body>
     <h1> Supermarket management</h1>
     <form action="Ejercici2.php" method="post">
         <label for="value"> Worker name: </label>
         <input type="string" id="name" name="name">

         <h3>Choose Product: </h3>
         <select name="position">
             <?php foreach ($_SESSION['drinks'] as $name => $stock) { ?>
                 <option value="<?php echo $name; ?>">
                     <?php echo $name; ?>
                 </option>
             <?php } ?>
         </select>
         <h3>Product quantity: </h3>
         <input type="text" id="product" name="product">
         <br><br>

         <input type="submit" value="add" name="add">
         <input type="submit" value="remove" name="remove">
         <input type="submit" value="reset" name="reset">
         <p>
         <h2>Inventory: </h2>
         </p>
         <p>
             <?php
                if (isset($_SESSION['worker'])) {
                    echo " Worker: ".  $_SESSION['worker']. "<br>";
                   
                }
                foreach ($_SESSION['drinks'] as $name => $stock) {
                    echo "Units $name: $stock units <br>";
                }
                ?>
         </p>

     </form>
 </body>

 </html>
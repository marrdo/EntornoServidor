<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Multipasos</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    
</head>
<body>
    <h1>Ejercicio formulario multipasos en INDEX</h1>
    <section class="">
        <?php 
            if((isset($_SESSION['paso']))  && ($_SESSION['paso']==1)){

                echo $pintar_formulario;

            }elseif((isset($_SESSION['paso']))  && ($_SESSION['paso']==2)){

                echo $pintar_formulario;

            }elseif((isset($_SESSION['paso']))  && ($_SESSION['paso']==3)){

                echo $pintar_plan_mejora;
                echo $pintar_formulario;

            }elseif((isset($_SESSION['paso']))  && ($_SESSION['paso']==4)){

                echo $pintar_formulario;

            }elseif((isset($_SESSION['paso']))  && ($_SESSION['paso']==5)){

                
                echo $pintar_formulario;
            }
        ?>
    </section>    
</body>
</html>
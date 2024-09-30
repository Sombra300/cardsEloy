<?php
 /**
     * @author Eloy
     * @version 1 
     */
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="styleshee" href="/style/normalice.css">
    <link rel="styleshee" href="/style/estilo.css">
</head>
<body>
    <h1>HIGHER</h1><br>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/enlaces.inc.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/jugadores.inc.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/baraja.inc.php');
        shuffle($players);
        shuffle($deck);
        $player1=array_pop($players);
        $player2=array_pop($players);
        for($i=0;$i<10;$i++){
            $hand1[]=array_pop($deck);
            $hand2[]=array_pop($deck);
        }
        echo($player1.'<br>');
        for($i=0;$i<10;$i++){
            echo '<img src="/imagenes/baraja/'.$hand1[$i]['image'].'" alt="carta '.$i.'">';
        }
        echo '<br>';
        echo('<br>'.$player2.'<br>');
        foreach($deck as $card){

            switch($card['value']){
                case 'J':
                    $card['value']=11;
                    break;
                case 'Q':
                    $card['value']=12;
                    break;
                case 'K':
                    $card['value']=13;
                    break;
                default:
                $value;
            }
        }
        $points1=0;
        $points2=0;
        for($i=0;$i<10;$i++){
            echo '<img src="/imagenes/baraja/'.$hand2[$i]['image'].'" alt="carta '.$i.'">';
            if($hand1[$i]['value']>$hand2[$i]['value']){
                $points1++;
            }else{
                if($hand1[$i]['value']<$hand2[$i]['value']){
                    $points2++;
                }
            }
        }
        
    ?>
    
        <h4>Puntuación</h4>
        <?php
        echo $player1.': '.$points1.' puntos <br>';
        echo $player2.': '.$points2.' puntos <br>';
        if($points1>$points2){
            echo 'Ganador: '.$player1;
        }else{
            if($points1==$points2){
                echo 'Ganador: EMPATE';
            }else{
                echo 'Ganador: '.$player2;
            }
        }
        ?>

    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/footer.inc.php');
    ?>
</body>
</html>
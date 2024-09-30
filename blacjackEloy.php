<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>BLACJACK</h1>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/enlaces.inc.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/jugadores.inc.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/baraja.inc.php');
        $player0='Banca';
        shuffle($players);
        $player1=array_pop($players);
        $player2=array_pop($players);
        $player3=array_pop($players);
        $player4=array_pop($players);
        $player5=array_pop($players);
        shuffle($deck);
        foreach($deck as $card){

        }
        for($i=0;$i<2;$i++){
            $hand1[]=array_pop($deck);
            $hand2[]=array_pop($deck);
            $hand3[]=array_pop($deck);
            $hand4[]=array_pop($deck);
            $hand5[]=array_pop($deck);
            $hand0[]=array_pop($deck);
        }
        $points1=0;
        $cont_as=0;
        foreach($hand1 as $card){
            if($card['value']==1){
                $cont_as++;
            }
            switch($card['value']){
                case 'J':
                case 'Q':
                case 'K':
                    $card['value']=10;
                    break;
                default:
                $value;
            }
            $points1+=$card['value'];
        }
        for($i=0; $i<$cont_as; $i++){
            if (($points1+10)<=21) {
                $points1+=10;
            }
        }
        $points2=0;
        $cont_as=0;
        foreach($hand2 as $card){
            if($card['value']==1){
                $cont_as++;
            }
            switch($card['value']){
                case 'J':
                case 'Q':
                case 'K':
                    $card['value']=10;
                    break;
                default:
                $value;
            }
            $points2+=$card['value'];
        }
        for($i=0; $i<$cont_as; $i++){
            if (($points2+10)<=21) {
                $points2+=10;
            }
        }
        $points3=0;
        $cont_as=0;
        foreach($hand3 as $card){
            if($card['value']==1){
                $cont_as++;
            }
            switch($card['value']){
                case 'J':
                case 'Q':
                case 'K':
                    $card['value']=10;
                    break;
                default:
                $value;
            }
            $points3+=$card['value'];
        }
        for($i=0; $i<$cont_as; $i++){
            if (($points3+10)<=21) {
                $points3+=10;
            }
        }
        $points4=0;
        $cont_as=0;
        foreach($hand4 as $card){
            if($card['value']==1){
                $cont_as++;
            }
            switch($card['value']){
                case 'J':
                case 'Q':
                case 'K':
                    $card['value']=10;
                    break;
                default:
                $value;
            }
            $points4+=$card['value'];
        }
        for($i=0; $i<$cont_as; $i++){
            if (($points4+10)<=21) {
                $points4+=10;
            }
        }
        $points0=0;
        $cont_as=0;
        foreach($hand0 as $card){
            if($card['value']==1){
                $cont_as++;
            }
            switch($card['value']){
                case 'J':
                case 'Q':
                case 'K':
                    $card['value']=10;
                    break;
                default:
                $value;
            }
            $points0+=$card['value'];
        }
        for($i=0; $i<$cont_as; $i++){
            if (($points0+10)<=21) {
                $points0+=10;
            }
        }
        if($points1<14){
            do{           
                $cont_as=0;
                $hand1[]=array_pop($deck);
                foreach($hand1 as $card){
                    if($card['value']==1){
                        $cont_as++;
                    }
                    switch($card['value']){
                        case 'J':
                        case 'Q':
                        case 'K':
                            $card['value']=10;
                            break;
                        default:
                        $value;
                    }
                    $points1+=$card['value'];
                }
                for($i=0; $i<$cont_as; $i++){
                    if (($points1+10)<=21) {
                        $points1+=10;
                    }
                }
            }while($points1<14);
        }


        
        ?>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/footer.inc.php');
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>BLACKJACK</h1>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/enlaces.inc.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/jugadores.inc.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/baraja.inc.php');


        $player0 = 'Banca';
        shuffle($players);


        // Seleccionar jugadores
        $player1 = array_pop($players);
        $player2 = array_pop($players);
        $player3 = array_pop($players);
        $player4 = array_pop($players);
        $player5 = array_pop($players);
        shuffle($deck);


        // Inicializar datos de los jugadores
        $players_data = [
            ['name' => 'Banca', 'hand' => [], 'points' => 0],
            ['name' => $player1, 'hand' => [], 'points' => 0],
            ['name' => $player2, 'hand' => [], 'points' => 0],
            ['name' => $player3, 'hand' => [], 'points' => 0],
            ['name' => $player4, 'hand' => [], 'points' => 0],
            ['name' => $player5, 'hand' => [], 'points' => 0]
        ];


        // Repartir 2 cartas a cada jugador
        for ($i = 0; $i < 2; $i++) {
            foreach ($players_data as &$player) {
                $player['hand'][] = array_pop($deck);
            }
        }


        // Función para calcular los puntos
        function calculatePoints($hand) {
            $points = 0;
            $aces = 0;
            foreach ($hand as $card) {
                switch ($card['value']) {
                    case 'J':
                    case 'Q':
                    case 'K':
                        $points += 10;
                        break;
                    case '1':
                        $aces++;
                        $points += 1;
                        break;
                    default:
                        $points += intval($card['value']);
                }
            }
            while ($aces > 0 && $points + 10 <= 21) {
                $points += 10;
                $aces--;
            }
            return $points;
        }


        // Calcular puntos
        foreach ($players_data as &$player) {
            $player['points'] = calculatePoints($player['hand']);
            while ($player['points'] < 14) {
                $player['hand'][] = array_pop($deck);
                $player['points'] = calculatePoints($player['hand']);
            }
        }


        // Mostrar cartas de cada jugador y su puntaje
        foreach ($players_data as $player) {
            echo '<h2>' . $player['name'] . '</h2>';
            foreach ($player['hand'] as $card) {
                echo '<img src="/imagenes/baraja/' . $card['image'] . '" alt="' . $card['value'] . ' de ' . $card['suit'] . '" style="width: 100px; height: auto;">';
            }
            echo '<br>Puntos: ' . $player['points'];

            if($player['points']>21){
                echo ' HA PERDIDO <br><br>';
            }else{
                if($player['points']==$players_data[0]['points']) {
                    echo '<br><br>';
                }else{
                    if($player['points']>$players_data[0]['points']){
                        echo ' HA GANADO <br><br>';
                    }else{
                        if($players_data[0]['points']>21){
                            echo ' HA GANADO <br><br>';
                        }else{
                            echo ' HA PERDIDO <br><br>';
                        }
                    }
                }
            }
        }

        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/footer.inc.php');
    ?>
</body>
</html>

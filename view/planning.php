<?php
session_start();

use Controllers\Planning;

require_once '../libraries/controllers/Planning.php';
require_once '../libraries/models/Planning.php';

$planning = new Planning();

$start = new DateTime('now');
$start_m = (clone $start)->modify('last monday');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning</title>
    <link rel="stylesheet" href="../public/style/style.css">
</head>

<body>
    <?php require_once 'header.php' ?>
    <main>
        <h1>Semaine du <?= $planning->toString()->format('d-m'); ?> au <?= $planning->toString()->modify('6 day')->format('d-m-Y'); ?></h1>

        <!-- <table>
            <?php for ($i = 7; $i < 20; $i++) : ?>
                <tr>
                    <?php for ($j = -1; $j < 7; $j++) : ?>
                        <?php $day = (clone $start_m)->modify('+' . $j . 'day');
                        $heure = (clone $day)->modify('+' . $i . 'hour');
                        $resa = $planning->startEvent($heure->format('Y-m-d H:s'));
                        ?>

                        <td>
                            <?php if ($i === 7) {
                                if ($j == -1) : ?>
                                    <div>Horaire</div>
                                <?php else : ?>
                                    <div><?= $day->format('m-d') ?></div>
                            <?php endif;
                            }
                            ?>
                            <?php if ($j == -1 && $i != 7) : ?>
                                <div><?= $heure->format('H:s'); ?></div>

                            <?php else : ?>
                                <?php if (!empty($resa)) : ?>
                                    <a href="./reservation.php?reservation=<?= $resa[0]['id']; ?>">
                                        <div>
                                            <p><?= $resa[0]['titre']; ?></p>
                                            <p><?= $resa[0]['login']; ?></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>

                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table> -->

        <table>
            <thead>
                <?= $planning->headPlanning(); ?>
            </thead>
            <tbody>
                <?= $planning->bodyTable(); ?>
            </tbody>
        </table>

    </main>
</body>

</html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>SPACE PERFECT</title>
    <!--META-->
    <meta name="author" content="Piotr Zbinski"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--MAIN CSS-->
    <link rel="stylesheet" href="public/css/style.css" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">

</head>
<body>
    <div></div>
    <div class="bar3"></div>
    <div class="bar4"></div>
    <div class="menu-game">
        <div>
            <h2>SPACE</h2>
            <h2>PERFECT</h2>
            <div>
                <button id="b1">Play</button>
                <button id="b2" onclick="scores.style.display = 'flex'">Level Info</button>
                <button id="b3">Credits</button>
            </div>
            <p id="credits">
                PZ 2024 &copy; All rights reserved <br>
            </p>
            <h7><a href="levelSelect">BACK</a></h7>
        </div>
        <section id="scores" class="highscores">
            <div>
                <div>
                    <h4>Level Info</h4>
                    <div id="best">
                        <p>Author|<span><?php echo $map->getAuthor();?></span></p>
                        <p>Title|<span><?php echo $map->getTitle();?></span></p>
                        <p>Difficulty|<span><?php echo $map->getDifficulty();?>/5</span></p>
                        <p>Clears|<span><?php echo $map->getClears();?></span></p>
                        <p>Crashes|<span><?php echo $map->getCrashes();?></span></p>
                    </div>
                    <button onclick="scores.style.display = 'none'">OK</button>
                </div>
            </div>
        </section>
    </div>
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="game">
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div class="p"></div><div></div><div></div>
    </div>
    <div class="endwin">
        <div>
            <div>
                <h4>YOU'VE WON!</h4>
                <form action="winMap" method="POST">
                    <input type="hidden" name="map_index" value="<?php echo $map->getIdUserMap(); ?>">
                    <button type="submit">EASY!</button>
                </form>
            </div>
        </div>
    </div>
    <div class="endlose">
        <div>
            <div>
                <h4>YOU LOSE</h4>
                <form action="loseMap" method="POST">
                    <input type="hidden" name="map_index" value="<?php echo $map->getIdUserMap(); ?>">
                    <button type="submit">OK :(</button>
                </form>
            </div>
        </div>
    </div>
    <div class="levelHidd"></div>
	
    <!-- JAVASCRIPT -->
     <script type="text/javascript">
        var campaignMap = JSON.parse(<?php echo json_encode($map->getMapCode());?>);
    
        console.log(typeof(campaignMap))

     </script>
    <script src="public/js/javascript.js" type="text/javascript"></script>
</body>
</html>
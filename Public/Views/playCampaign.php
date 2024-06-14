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
    <div class="menu">
        <div>
            <h2>SPACE</h2>
            <h2>PERFECTT</h2>
            <div>
                <button id="b1">New Game</button>
                <button id="b2" onclick="scores.style.display = 'flex'">Level Info</button>
                <button id="b3">Credits</button>
            </div>
            <p id="credits">PZ 2024 &copy; All rights reserved</p>
        </div>
        <section id="scores" class="highscores">
            <div>
                <div>
                    <h4>Level Info</h4>
                    <div id="best">
                        <p>Lint<span>1232</span></p>
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
                <input name="winner" placeholder="TYPE YOUR NAME">
                <button id="won">SUBMIT</button>
            </div>
        </div>
    </div>
    <div class="endlose">
        <div>
            <div>
                <h4>YOU LOSE</h4>
                <button onclick="location.reload()">OK</button>
            </div>
        </div>
    </div>
    <div class="levelHidd"></div>
	
    <!-- JAVASCRIPT -->
    <script src="public/js/javascript.js" type="text/javascript"></script>
</body>
</html>
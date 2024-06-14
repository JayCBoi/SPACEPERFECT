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
    <div class="main-menu">
        <div class="top-text">
            <h2 class="game-title"><span>SPACE</span><span>PERFECT</span></h2>
            <p id="random-welcome-message">Hi there <?php if(isset($user)){ echo $user->getLogin();}?><wbr><span id="random-message">, reach for the stars!</span></p>
        </div>

        <div class="centered-buttons">
            <div class="main-menu-buttons">
                <div class="first-two">
                    <div>
                        <a href="">QUICK<br> PLAY</a>
                    </div>
                    <div>
                        <a href="">LEVEL SELECT</a>
                    </div>
                    
                </div>
                <div class="second-two">
                    <div>
                        <a href="logout">Logout</a>
                        <!--<a href="">LEVEL EDITOR</a>-->
                    </div>
                    <div>
                        <a href="">OPTIONS</a>
                    </div>
    
                </div>
            </div>
        </div>
        
    </div>
	
    <!-- JAVASCRIPT -->
    <script src="public/js/javascript.js" type="text/javascript"></script>
</body>
</html>
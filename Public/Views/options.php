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
            
            <h2 class="section-title">
                <span id="main-title">SPACEPERFECT/</span>OPTIONS

                <div class="back-to-menu">
                    <a href="mainMenu">↩</a>
                </div>
            </h2>
            <p id="random-welcome-message"><span id="random-message">See them stats!</span></p>
        </div>

        <div class="options-sections">
            <div class="left-section">
                <div class="details">
                    <h5>ACCOUNT DETAILS</h5>
                    <p>Login:<span><?php echo $_SESSION['user']->getLogin(); ?></span></p>
                    <p>Email:<span><?php echo $_SESSION['user']->getEmail(); ?></span></p>
                    <p>Registration date:<span><?php echo $_SESSION['user']->getCreatedAtDate(); ?></span></p>

                </div>
                <div class="change-password">
                    <form action="changePassword" method="POST">
                        <h5>Wanna change password?</h5>
                        <input name="new_password" type="password" placeholder="New password"/><br>
                        <input name="confirm_password" type="password" placeholder="New password(again)"/><br>
                        <button class="options-button" type="submit">CHANGE MY PASSWORD</button>
                        <?php if(isset($messages)){
                            echo '<p class="validation-message">';
                            foreach($messages as $message){
                                echo $message;
                            };
                            echo '</p>';
                        }
                        ?>
                    </form>
                </div>
                <div class="logout">
                    <h5>Wanna log out?</h5>
                    <button class="options-button" type="button"><a href="logout">LOG OUT</a></button>
                </div>

                <div class="logout">
                    <h5>Wanna <span class="alert">delete</span> your acc.?</h5>
                    <button class="options-button" type="button"><a href="deleteAccount">DELETE</a></button>
                </div>

            </div>
            <div class="right-section">
                <div class="stats">
                    <h5>PLAYER STATISTICS</h5>
                    <p>Levels cleared:<span><?php echo $_SESSION['user']->getLevelsCleared(); ?></span></p>
                    <p>Campaign levels cleared:<span><?php echo $_SESSION['user']->getCampaignLevelsCleared(); ?></span></p>
                    <p>Crashes:<span><?php echo $_SESSION['user']->getCrashes(); ?></span></p>
                    <p>Built maps:<span><?php echo $_SESSION['user']->getMapsBuilt(); ?></span></p>
                </div>
            </div>
        </div>
        
    </div>
	
    <!-- JAVASCRIPT -->
    <script src="" type="text/javascript"></script>
</body>
</html>
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
                <span id="main-title">SPACEPERFECT/</span>LEVEL SELECT

                <div class="back-to-menu">
                    <a href="mainMenu">↩</a>
                </div>
            </h2>
            <p id="random-welcome-message"><span id="random-message">So <?php echo $_SESSION['user']->getLogin(); ?>...</span></p>
        </div>

        <div class="sections">
            <div class="campaign-levels">
                <p class="section-caption">SPACE CAMPAIGN</p>

                <?php foreach ($campaignMaps as $map): ?>
                    <a href="playCampaign?map_id=<?= $map->getMapIndex() ?>"><?= $map->getMapIndex() ?></a>
                <?php endforeach; ?>

            </div>

            <div class="your-levels">
                <p class="section-caption">YOUR LEVELS</p>

                <?php foreach ($userMaps as $map): ?>
                    <a href="playMap?map_id=<?= $map->getIdUserMap() ?>">
                        <p>Title: <span><?= $map->getTitle() ?></span></p>
                        <p>Difficulty: <span><?= $map->getDifficulty() ?>/5</span></p>
                        <p>Clearance: <span><?= $map->getClears() ?></span></p>
                        <p>Crashes: <span><?= $map->getCrashes() ?></span></p>
                    </a>
                <?php endforeach; ?>
                
            </div>

            <div class="your-levels">
                <p class="section-caption">COMMUNITY LEVELS</p>

                <?php foreach ($communityMaps as $map): ?>
                    <a href="playMap?map_id=<?= $map->getIdUserMap() ?>">
                        <p>Title: <span><?= $map->getTitle() ?></span></p>
                        <p>Difficulty: <span><?= $map->getDifficulty() ?>/5</span></p>
                        <p>Clearance: <span><?= $map->getClears() ?></span></p>
                        <p>Crashes: <span><?= $map->getCrashes() ?></span></p>
                        <p class="author">by: <span><?= $map->getAuthor() ?></span></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        
    </div>
	
    <!-- JAVASCRIPT -->
    <script src="js/javascript.js" type="text/javascript"></script>
</body>
</html>
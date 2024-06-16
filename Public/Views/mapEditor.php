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
    <div class="editor">
        <div class="contents">
            <div class="header">
                <h2>EDITOR</h2>
                <div class="back-to-menu">
                    <a href="mainMenu">↩</a>
                </div>
                <p class="validation-message levelHidd"></p>
            </div>
            <div class="editor-body">
                <div class="editor-menu">
                    <div  onclick="display(1)">
                        <p>My Maps</p>
                    </div>
                    <div onclick="display(2)">
                        <p>New Map</p>
                    </div>
                    <?php
                    if ($_SESSION['user']->getUserAccountType() == 1) {
                        echo '
                        <div onclick="display(3)">
                            <p>New Campaign</p>
                        </div>
                        ';
                    }
                    ?>
                </div>

                <div class="editor-content">

                    <div id="yourMap" class="your-maps">
                        <?php if (!empty($userMaps)): ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Clears</th>
                                        <th>Crashes</th>
                                        <th>Difficulty</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                        <?php foreach ($userMaps as $i=>$map): ?>
                                    <tr>
                                        <td><?= ($i+1) ?></td>
                                        <td><?= $map->getTitle() ?></td>
                                        <td><?= $map->getClears() ?></td>
                                        <td><?= $map->getCrashes() ?></td>
                                        <td><?= $map->getDifficulty() ?></td>
                                        <td><?= $map->getCreatedAtDate() ?></td>
                                        <td class="map-deletion" value="<?= $map->getIdUserMap() ?>">X</td>
                                    </tr>
                                
                        <?php endforeach; ?>
                            </tbody>
                            </table>
                        <?php endif; ?>
                    </div>

                    <div id="newMap" class="new-map levelHidd">
                        <div class="new-map-menu first-menu">
                            <input id="mapTitle" type="text" placeholder="title">
                            <input id="mapDifficulty" type="number" min="1" max="5" placeholder="Difficulty(1-5)">
                        </div>
                        <div class="new-map-menu">
                            <input id="how" type="number" min="10" value="10">
                            <button id="gen">GENERATE</button>
                            <button id="addMap">UPLOAD</button>
                        </div>
                        

                        <div id="checksMap" class="checks">
                            
                        </div>
                    </div>

                    <div id="campaign-new-map" class="new-map levelHidd">
                        <div class="new-map-menu first-menu">
                            <input id="campTitle" type="text" placeholder="title">
                            <input id="campIndex" type="number" placeholder="Map index">
                        </div>
                        <div class="new-map-menu">
                            <input id="howCamp" type="number" min="10" value="10">
                            <button id="genCamp">GENERATE</button>
                            <button id="addCamp">UPLOAD</button>
                        </div>
                        

                        <div id="checksCampaign" class="checks">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="public/js/editor.js" type="text/javascript"></script>
</body>
</html>
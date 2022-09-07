    <html>
    <head>
        <title>
            Soundboard
        </title>
        <script src="assets/script/audio.js" type="text/javascript"></script>
        <link href="assets/style/theme.css" type="text/css" rel="stylesheet"/>
        <script>
            function loadBackground(wallpaper)
            {
                //console.log(wallpaper);
                document.body.style.backgroundImage = "url('content/images/" + wallpaper + "/wallpaper.png')";
            }
        </script>
    </head>
    <?php
        if(!isset($_POST["group"]))
        {
            $group = "rick_and_morty";
        }else
        {
            $group = ($_POST["group"] == 0) ? "rick_and_morty" : "borat";
        }
    ?>
    <body onload="loadBackground('<?php echo $group  ?>')">
        <div id="container">
            <h1>Soundboard</h1>
            <div id="body"> 
                
                <div class="menuButtons">
                    <form method="POST" id='group_select'>
                        <select name="group" onchange="document.getElementById('group_select').submit();">
                            <option>-- select group --</option>
                            <option value="0" <?php echo ($group == "rick_and_morty") ? "selected" : null;?>>Rick and Morty</option>
                            <option value="1" <?php echo ($group == "borat") ? "selected" : null;?>>Borat</option>
                        </select>
                    </form>
                </div>
                <table id="memoryBoard" class="tblSlots" width="100%" border="0" style="margin-top:400px;">
                    <tr>
                        <?php
                            $counter    = 0;
                            $group      = isset($_POST["group"]) ? (int)$_POST["group"] : 0;
                            $mySounds   = simplexml_load_file('soundboard.xml');

                            foreach ($mySounds->group[$group] as $element)
                            {   
                                echo "<td onclick=\"playSound('" . $mySounds->group[$group]["name"] . "', '" 
                                . $element['filename'] . "')\" id=\"1.1\" class=\"tile\">" . $element . "</td>";
                                
                                $counter++;
                                if($counter == 5)
                                {
                                    echo "</tr><tr>";
                                    $counter = 0;
                                }
                            }
                        ?>
                    </tr>
                </table>
            </div>
            <p class="footer">Copyright &copy; {Yourname}</p>
        </div>
    </body>
</html>
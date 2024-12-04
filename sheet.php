<!DOCTYPE html>
<html>
<head>
	<title>Character Sheet</title>
	<?php
    require 'includes/links.inc.php';
    require 'includes/dbh.inc.php';
    ?>
	 
</head>
<body class="signup">
    <form>

	<h1>Character Sheet</h1>

	<?php

    const ww_head_titles = ["Name", "Breed", "Pack Name", "Player", "Auspice", "Pack Totem", "Chronicl", "Tribe", "Concept"];
    const ww_attributes_titles = ["Strength", "Charisma", "Perception", "Dexterity", "Manipilation", "Intelligence", "Stamina", "Appearance", "Wits"];
    const ww_abilities_titles = ["Alertness","Animal Ken","Academics","Athletics","Guns","Enigmas",
        "Brawl","Crafts","Hearth Wisdom","Empathy","Etiquette","Investigation","Expression","Larceny",
        "Law","Intimidation","Melee","Medicine","Leadership","Performance","Occult","Primal-Urge",
        "Ride","Rituals","Streetwise","Stealth","Seneschal","Subterfuge","Survival","Science"];
    const ww_health = '{"Brused":0,"Hurt":-1,"Injured":-1,"Wounded":-2,"Mauled":-2,"Crippled":-5,"Incapacitated":-1}';

    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $id = $_GET["id"];
        $sql = "SELECT * FROM characters WHERE id=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../header.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $head_values = $row["head"];
                $attributes_values = $row["attributes"];
                $attributes_specialization = $row["attributes_specialization"];
                $abilities_values = $row["abilities"];
                $abilities_specialization = $row["abilities_specialization"];
                $backgrounds = $row["backgrounds"];
                $gifts = $row["gifts"];
                $glory_max = $row["glory_max"];
                $glory_current = $row["glory_current"];
                $honor_max = $row["honor_max"];
                $honor_current = $row["honor_current"];
                $wisdom_max = $row["wisdom_max"];
                $wisdom_current = $row["wisdom_current"];
                $rank = $row["rank"];
                $experience = $row["experience"];
            } else {
                header("Location: ../header.php?error=nouser");
                exit();
            }
        }
    } else {
        $head_values = ["Captain Jauces", "b", "c", "Rich", "e", "f", "g", "h", "i", "j"];
        $attributes_values = ["5", "2", "2", "4", "1", "1", "1", "1", "1", "1"];
        $attributes_specialization = ["sweep/cleave", "", "", "", "", "", "", "", "", ""];
        $abilities_values = ["1", "2", "3", "4", "5", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
        $abilities_specialization = ["", "", "", "", "", "", "grapple", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        $backgrounds = json_decode('{"Contacts":3,"Resources":2}');
        $gifts = ["gifts","Confident","Mind Peak"];
        $glory_max = 5;
        $glory_current = 1;
        $honor_max = 6;
        $honor_current = 2;
        $wisdom_max = 3;
        $wisdom_current = 1;
        $rank = "Cliath";
        $experience = "bal blaaa blaaa";
    }
 
    function dots($int){

        for ($i = 1; $i <= $int; $i++) {
            echo " • ";
        }
        $x = 10 - $int;
        for ($i = 1; $i <= $x; $i++) {
            echo " ◦ ";
        }
    }
    

    ?>
	<div class="container">
		<div class="row">

	<?php

    $i = 0;
    foreach (ww_head_titles as $head_title) {
        echo "<div class='head col-md-1 col-sm-12 right'><lable>" . $head_title . "</label></div><div class='head_input col-md-3 col-sm-6 left'><input class='wide' id='" . $head_title . "' name='" . $head_title . "' type='text' value='" . $head_values[$i] . "'></div>";
        $i++;
    }

    ?>

		</div>
		<div class="row">
			
			<div class='attributes col-sm-12'><br/><h2>Attributes</h2></div>
			<div class='attributes col-md-4 col-sm-12'><h3>Physical</h3></div>
			<div class='attributes col-md-4 col-sm-12'><h3>Social</h3></div>
			<div class='attributes col-md-4 col-sm-12'><h3>Mental</h3></div>
	<?php

    $i = 0;
    foreach (ww_attributes_titles as $attributes_title) {
        echo "<div class='attributes col-md-1 col-sm-6 right'><lable>" . $attributes_title . "</label></div><div class='attributes col-md-3 col-sm-6 left'><input class='inum' id='" . $attributes_title . "' name='" . $attributes_title . "' type='text' value='" . $attributes_values[$i] . "' size='1' maxlength='2'><span class='special'>" . $attributes_specialization[$i] . "</span></div>";
        echo "<script >addCirclesAfterNumber('" . $attributes_title . "')</script>";
        $i++;
    }

    ?>
		
        </div>
		<div class="row">
			
			<div class='abilities col-sm-12'><br/><h2>Abilities</h2></div>
			<div class='abilities col-md-4 col-sm-12'><h3>Talents</h3></div>
			<div class='abilities col-md-4 col-sm-12'><h3>Skills</h3></div>
			<div class='abilities col-md-4 col-sm-12'><h3>Knowledge</h3></div>
	<?php

    $i = 0;
    foreach (ww_abilities_titles as $abilities_title) {
        echo "<div class='abilities col-md-2 col-sm-6 right'><lable>" . $abilities_title . "</label></div><div class='abilities col-md-2 col-sm-6 left'><input class='inum' id='" . $abilities_title . "' name='" . $abilities_title . "' type='text' value='" . $abilities_values[$i] . "' size='1' maxlength='2'><span class='special'>" . $abilities_specialization[$i] . "</span></div>";
        echo "<script >addCirclesAfterNumber('" . $abilities_title . "')</script>";
        $i++;
    }

    ?>
		</div>

        <div class="row">
			<div class='abilities col-sm-12'><br/><h2>Advantages</h2></div>
			<div class='abilities col-md-4 col-sm-12 center'>
                <h3>Backgrounds</h3>
                <?php
                if ($backgrounds != ""){
                    $i = 0;

                    foreach ($backgrounds as $key => $value) {
                        echo "<input class='' id='". $key."' name='backgrounds' value=' " . $key . " ' />";
                        echo "<select name='new_bg' id='bg'>
                                <option value='1' ". ($value == 1 ? " selected " : " " ).">1</option>
                                <option value='2' " . ($value == 2 ? " selected " : " ") . ">2</option>
                                <option value='3' " . ($value == 3 ? " selected " : " ") . ">3</option>
                                <option value='4' " . ($value == 4 ? " selected " : " ") . ">4</option>
                                <option value='5' " . ($value == 5 ? " selected " : " ") . ">5</option>
                                <option value='X'> X </option>
                            </select><br/>";
                    }
                }

                ?>

                <br/>
                <input class="" id="" name="" value=" add background" />
                <select name="new_bg" id="bg">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
			<div class='abilities col-md-8 col-sm-12'>
                <h3>Gifts</h3>
                	<?php
                    foreach ($gifts as $gift) {
                        echo '<div class="gifts"><input  type="text" class="gift" id="' . $gift . '" name="' . $gift . '" value="' . $gift . '" /><button>x</button></div>';
                    }
                    ?>
                <div class="gifts">
                    <input type="text" class="gift_add" id="gift" name="gift" value=" add gift" /><button>+</button>
                </div>
            </div>
		</div>
        <div class="row">
            <div class='abilities col-md-4 col-sm-12 center'>
                <h3>Renown</h3>
                <h4>Glory</h4>
                <button>-</button>
                <?php
                for ($i = 1; $i <= $glory_max; $i++) {
                    echo "X";
                }
                $max = 10 - $glory_max;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                echo "<button>+</button><br/><button>-</button>";

                for ($i = 1; $i <= $glory_current; $i++) {
                    echo "X";
                }
                $max = 10 - $glory_current;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                ?>
                <button>+</button>
                <h4>Honor</h4>
                 <button>-</button>
                <?php
                for ($i = 1; $i <= $honor_max; $i++) {
                    echo "X";
                }
                $max = 10 - $honor_max;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                echo "<button>+</button><br/><button>-</button>";

                for ($i = 1; $i <= $honor_current; $i++) {
                    echo "X";
                }
                $max = 10 - $honor_current;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                ?>
                <button>+</button>
                <h4>Wisdom</h4>
                 <button>-</button>
                <?php
                for ($i = 1; $i <= $wisdom_max; $i++) {
                    echo "X";
                }
                $max = 10 - $wisdom_max;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                echo "<button>+</button><br/><button>-</button>";

                for ($i = 1; $i <= $wisdom_current; $i++) {
                    echo "X";
                }
                $max = 10 - $wisdom_current;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                ?>
                <button>+</button>
            </div>
             <div class='abilities col-md-4 col-sm-12 center'>
                 <br/>
                <h4>Rage</h4>
                <button>-</button>
                <?php
                for ($i = 1; $i <= $glory_max; $i++) {
                    echo "X";
                }
                $max = 10 - $glory_max;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                echo "<button>+</button><br/><button>-</button>";

                for ($i = 1; $i <= $glory_current; $i++) {
                    echo "X";
                }
                $max = 10 - $glory_current;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                ?>
                <button>+</button>
                <h4>Gnosis</h4>
                 <button>-</button>
                <?php
                for ($i = 1; $i <= $honor_max; $i++) {
                    echo "X";
                }
                $max = 10 - $honor_max;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                echo "<button>+</button><br/><button>-</button>";

                for ($i = 1; $i <= $honor_current; $i++) {
                    echo "X";
                }
                $max = 10 - $honor_current;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                ?>
                <button>+</button>
                <h4>Willpower</h4>
                 <button>-</button>
                <?php
                for ($i = 1; $i <= $wisdom_max; $i++) {
                    echo "X";
                }
                $max = 10 - $wisdom_max;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                echo "<button>+</button><br/><button>-</button>";

                for ($i = 1; $i <= $wisdom_current; $i++) {
                    echo "X";
                }
                $max = 10 - $wisdom_current;
                for ($i = 1; $i <= $max; $i++) {
                    echo "O";
                }
                ?>
                <button>+</button>
            </div>
            <div class='abilities col-md-4 col-sm-12 center'>
                 <br/>
                <h4>Health</h4>
                <?php
                $health = json_decode(ww_health);
                foreach ($health as $key => $value) {
                    echo '<div class="health left">' . $key . '</div><div class="health right">' . $value .
                        '</div><div class="health right">O</div><br/>';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class='abilities col-md-4 col-sm-12 center'>
                <h4>Rank</h4>
                <?php
                 echo '<input  type="text" class="rank" id="rank" name="rank" value="' . $rank . '" />';
                ?>   
            </div>
             <div class='abilities col-md-8 col-sm-12 center'>
                <h4>Experience</h4>
                  <?php
                  echo '<input  type="text" class="experience" id="experience" name="experience" value="' . $experience . '" />';
                  ?>
            </div>
        </div>
	</div>
    </form>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>

 <?php
 require 'footer.php';
 ?>



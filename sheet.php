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
                $rage_max = 6;
                $rage_current = 6;
                $gnosis_max = 6;
                $gnosis_current = 6;
                $will_max = 6;
                $will_current = 6;
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
        $rage_max = 6;
        $rage_current = 1;
        $gnosis_max = 4;
        $gnosis_current = 0;
        $will_max = 3;
        $will_current = 1;



        $rank = "Cliath";
        $experience = "bal blaaa blaaa";
    }
 
    function dots($maximum, $current, $name){
        $m = null;
        $m = $maximum;
        $c = null;
        $c = $current;
        echo "<input  type='text' class='hidden' id='bg_" . $name . "' name='bg_" . $name . "' value=' " . $m . " ' />";
        echo "<script >addCirclesAfterNumber('bg_" . $name. "')</script>";
        echo "<br/>";
        for ($i = 1; $i <= $c; $i++) {
            echo "<input  type='checkbox' class='checkbox' id='bg_" . $c . "' name=''bg_" . $name . "'' value=' " . $i . " ' checked />";
        }
        $max = 10 - $c;
        for ($i = 1; $i <= $max; $i++) {
            echo "<input  type='checkbox' class='checkbox' id='bg_" . $c . "' name=''bg_" . $name . "'' value=' " . $i . " ' />";
        }
        $m = null;
        $c = null;
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
                        echo "<input  type='text' class='backgrounds' id='bg_". $key."' name='backgrounds_" . $key . "_name' value=' " . $key . " ' />";
                        echo "<input  type='text' class='hidden' id='bg_" . $value . "' name='backgrounds_" . $key . "_value' value=' " . $value . " ' />";
                        echo "<script >addCirclesAfterDropDown('bg_" . $value . "')</script><br/>";
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
                        echo '<div class="gifts"><input  type="text" class="gift" id="' . $gift . '" name="' . $gift . '" value="' . $gift . '" /><button id="' . $gift . '" class="btn btn-danger my_btn">X</button></div>';
                    }
                    ?>
                <div class="gifts">
                    <input type="text" class="gift_add" id="gift" name="gift" value=" add gift" /><button class="btn btn-success my_btn">+</buttonclass>
                </div>
            </div>
		</div>
        <div class="row">
            <div class='abilities col-md-4 col-sm-12 center'>
                <h3>Renown</h3>
                <h4>Glory</h4>
         

                <?php
                    dots($glory_max, $glory_current, "glory");
                ?>
               
                <h4>Honor</h4>
              
                <?php
                    dots($honor_max, $honor_current, "honor");
                ?>
              
                <h4>Wisdom</h4>
               
                <?php
                   dots($wisdom_max, $wisdom_current, "wisdom");
                ?>
            </div>
             <div class='abilities col-md-4 col-sm-12 center'>
                 <br/>
                <h4>Rage</h4>
                 <?php
                 dots($rage_max, $rage_current, "rage");
                 ?>
                <h4>Gnosis</h4>
                 <?php
                 dots($gnosis_max, $gnosis_current, "gnosis");
                 ?>
                <h4>Willpower</h4>
                 <?php
                 dots($will_max, $will_current, "willpower");
                 ?>
            </div>
            <div class='abilities col-md-4 col-sm-12 center'>
                 <br/>
                <h4>Health</h4>
                <?php
                $health = json_decode(ww_health);
                foreach ($health as $key => $value) {
                    echo '<div class="health left">' . $key . '</div><div class="health right">' . $value . '</div><div class="health right"><input  type="checkbox" class="checkbox" id="' . $key . '" name="' . $key . '" value="' . $i . '" /></div><br/>';
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
                  echo '<textarea id="experience" name="experience" rows="4" cols="50">' . $experience . '</textarea>';
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



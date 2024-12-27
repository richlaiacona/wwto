function addCirclesAfterNumber(elementId) {
    const element = document.getElementById(elementId);
    const number = element.value;
 
   //console.log(element);

    if (!isNaN(number)) {
        element.innerHTML = `${number}`;

         max = 10 - number;
        for (let i = 0; i < max; i++) {
            const dots = document.createElement('span');
            dots.classList.add('dots');
            element.insertAdjacentElement("afterend", dots);
        }

        for (let i = 0; i < number; i++) {
            const circle = document.createElement('span');
            circle.classList.add('circle');
            element.insertAdjacentElement("afterend", circle);
        }
    }
}

function addCirclesAfterDropDown(elementId) {
    const element = document.getElementById(elementId);
    //console.log(element);

    const number = element.value;
    //console.log("dd");

    if (!isNaN(number)) {
        element.innerHTML = `${number}`;

        max = 10 - number;
        for (let i = 0; i < max; i++) {
            const dots = document.createElement('span');
            dots.classList.add('dots');
            element.insertAdjacentElement('afterend', dots);
        }

        for (let i = 0; i < number; i++) {
            const circle = document.createElement('span');
            circle.classList.add('circle');
            element.insertAdjacentElement('afterend', circle);
        }
    }
}

function gather() {
    // gather data
    let head_values = "";
    const head_titles = ["Name", "Breed", "Pack Name", "Player", "Auspice", "Pack Totem", "Chronicl", "Tribe", "Concept"];
    let attributes_values = "";
    const ww_attributes_titles = ["Strength", "Charisma", "Perception", "Dexterity", "Manipilation", "Intelligence", "Stamina", "Appearance", "Wits"];
    let abilities_values = "";
    const ww_abilities_titles = ["Alertness", "Animal Ken", "Academics", "Athletics", "Guns", "Enigmas",
        "Brawl", "Crafts", "Hearth Wisdom", "Empathy", "Etiquette", "Investigation", "Expression", "Larceny",
        "Law", "Intimidation", "Melee", "Medicine", "Leadership", "Performance", "Occult", "Primal-Urge",
        "Ride", "Rituals", "Streetwise", "Stealth", "Seneschal", "Subterfuge", "Survival", "Science"];
    const attributes_specialization = ["Strength", "Charisma", "Perception", "Dexterity", "Manipilation", "Intelligence", "Stamina", "Appearance", "Wits"];
    const abilities_specialization = ["Alertness", "Animal Ken", "Academics", "Athletics", "Guns", "Enigmas",
        "Brawl", "Crafts", "Hearth Wisdom", "Empathy", "Etiquette", "Investigation", "Expression", "Larceny",
        "Law", "Intimidation", "Melee", "Medicine", "Leadership", "Performance", "Occult", "Primal-Urge",
        "Ride", "Rituals", "Streetwise", "Stealth", "Seneschal", "Subterfuge", "Survival", "Science"];

    let backgrounds = { "Contacts": 3, "Resources": 2 };

    let gifts = ["gifts", "Confident", "Mind Peak"];
    const renown = ["glory", "honor", "wisdom", "rage", "gnosis", "willpower"];

    let glory_max = 5;
    let glory_current = 1;
    let honor_max = 6;
    let honor_current = 2;
    let wisdom_max = 3;
    let wisdom_current = 1;
    let rage_max = 6;
    let rage_current = 1;
    let gnosis_max = 4;
    let gnosis_current = 0;
    let will_max = 3;
    let will_current = 1;

    head_values = getInputValues(head_titles);
    console.log(head_values);
    attributes_values = getInputValues(ww_attributes_titles);
    console.log(attributes_values);
    abilities_values = getInputValues(ww_abilities_titles);
    console.log(abilities_values);
    backgrounds = getInputValuesBackgrounds();
    console.log(backgrounds);

    function getInputValues(names) {
        let values = names.map(name => {
            let selector = '#' + name.replaceAll(' ', '');
            head_values = '"' + $(selector).val() + '"';
            return head_values;
        });
        return values.join(',');
    }

    attributes_special_values = getInputValuesSpecial(attributes_specialization);
    console.log(attributes_special_values);

    abilities_special_values = getInputValuesSpecial(abilities_specialization);
    console.log(abilities_special_values);

    gifts = getGifts();
    console.log(gifts);

    glory_max = getRenownMax("glory");
    console.log(glory_max);
    glory_current = getRenownCurrent("glory")
    console.log(glory_current);

    honor_max = getRenownMax("honor");
    console.log(honor_max);
    wisdom_max = getRenownMax("wisdom");
    console.log(wisdom_max);
    rage_max = getRenownMax("rage");
    console.log(rage_max);
    gnosis_max = getRenownMax("gnosis");
    console.log(gnosis_max);
    will_max = getRenownMax("willpower");
    console.log(will_max);


    function getInputValuesSpecial(names) {
        let values = names.map(name => {
            let sp_name = name + "_special";
            let selector = '#' + sp_name.replaceAll(' ', '');
            head_values = '"' + $(selector).val() + '"';
            return head_values;
        });
        return values.join(',');
    }

    let bg = "";

    function getInputValuesBackgrounds() {
        var bg = [];
        var bgv = [];
        var inputName = "";
        $(".backgrounds").each(function () {
            var val = "";
            inputName = $(this).val();
            val = '"' + inputName + '"';
            bg.push(val);
        });
        $(".bgnumber").each(function () {
            var inputValue = $(this).val();
            bgv.push(inputValue);
        });
        var values = "{";
        for (let i = 0; i < bg.length; i++) {
            values += bg[i] + ":" + bgv[i];
            if (i != bg.length - 1) {
                values += ",";
            }
        }
        values += "}";
        return values;
    }

    function getGifts() {
        var gifts = [];
        $(".gift").each(function () {
            //var value = "";
            //value = '"' + $(this).val() + '"';
            gifts.push($(this).val());
        })
        return gifts;
    }
    function getRenownMax(renown) {
        var c = '#'+renown;
        return $(c).val(); 
    }

    function getRenownCurrent(renown) {
        var c = '.' + renown + 'c';
        var current = "";
        $(c).each(function () {
            current = $(this).val();
        })
        return current;
    }
}
//INSERT INTO `users`(`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
//UPDATE `users` SET `idUsers`='[value-1]',`uidUsers`='[value-2]',`emailUsers`='[value-3]',`pwdUsers`='[value-4]' WHERE 1
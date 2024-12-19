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

    const backgrounds = { "Contacts": 3, "Resources": 2 };

    const gifts = ["gifts", "Confident", "Mind Peak"];
    const glory_max = 5;
    const glory_current = 1;
    const honor_max = 6;
    const honor_current = 2;
    const wisdom_max = 3;
    const wisdom_current = 1;
    const rage_max = 6;
    const rage_current = 1;
    const gnosis_max = 4;
    const gnosis_current = 0;
    const will_max = 3;
    const will_current = 1;

    head_values = getInputValues(head_titles);
    console.log(head_values);
    attributes_values = getInputValues(ww_attributes_titles);
    console.log(attributes_values);
    abilities_values = getInputValues(ww_abilities_titles);
    console.log(abilities_values);


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

}
//INSERT INTO `users`(`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
//UPDATE `users` SET `idUsers`='[value-1]',`uidUsers`='[value-2]',`emailUsers`='[value-3]',`pwdUsers`='[value-4]' WHERE 1
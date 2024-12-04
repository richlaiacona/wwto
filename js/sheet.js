function addCirclesAfterNumber(elementId) {
    const element = document.getElementById(elementId);
    const number = element.value;
 
    console.log(element.value);

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
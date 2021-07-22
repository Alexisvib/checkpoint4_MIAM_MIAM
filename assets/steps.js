const stepContainer = document.getElementById("step-container");

const formStep = stepContainer.dataset.prototype;

let indexStep = 0;
const buttonStep = document.getElementById('add-step');
const regex = /__name__/g;

buttonStep.addEventListener('click', (e) => {
    e.preventDefault();
    indexStep++;
    let li = document.createElement('li');
    li.innerHTML = formStep.replace(regex, 'step' + indexStep);
    stepContainer.appendChild(li);
})
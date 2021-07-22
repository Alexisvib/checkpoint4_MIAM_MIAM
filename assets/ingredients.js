const ingredientContainer = document.getElementById("ingredient-container");

const form = ingredientContainer.dataset.prototype;
let indexIngredient = 0;
const button = document.getElementById('add-ingredient');
const regex = /__name__/g;

button.addEventListener('click', (e) => {
    e.preventDefault();
    indexIngredient++;
    let li = document.createElement('li');
    li.innerHTML = form.replace(regex, 'ingredient' + indexIngredient);
    ingredientContainer.appendChild(li);
})
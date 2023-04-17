'use strict';
const myForm = document.getElementById('form');
const button = document.getElementById('button');

myForm.addEventListener('submit', function formСleaning(event) {
  event.preventDefault();

  myForm.reset();
});

const addFieldButton = document.getElementById('add_field');
const formDetails = document.getElementsByClassName('form__tbody');
const removeFieldButton = document.getElementById('remove_field');

let counter = 1;

addFieldButton.addEventListener('click', (event) => {

  const tr = document.createElement("tr");

  tr.classList.add('form__row');

  counter = counter + 1;

  tr.innerHTML = `<td class="form__ordinal-number">${counter}:</td>
  <td>
    <input class="form__textarea" type="text" name="description" maxlength="100" placeholder="назва деталі" required></input> 
  </td>
  <td>
    <input class="form__number" name="number" type="text" maxlength="2" placeholder="кількість деталей" value="1" required>
  </td>`;

  formDetails[0].appendChild(tr);
}); 

removeFieldButton.addEventListener('click', (event) => {
  event.preventDefault();

  const form = document.getElementById('table');

  const formChildren = form.children;

  const trArray = [];

  for(const elem of formChildren) {
    if (elem.nodeName === 'TR') {
      trArray.push(elem);
    };
  }

  const lastIndex = trArray.length - 1;
  const lastNodeInTable = trArray[lastIndex];

  form.removeChild(lastNodeInTable)

  counter = counter - 1;
  
});



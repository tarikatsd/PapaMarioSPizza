const addAdresseFormDeleteLink = (item) => {
  const removeFormButton = document.createElement('button');
  removeFormButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mt-2');
  removeFormButton.innerText = 'Suprimmer cette adresse';

  item.append(removeFormButton);

  removeFormButton.addEventListener('click', (e) => {
      e.preventDefault();
      item.remove();
  });
}

const addFormToCollection = (e) => {
  const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);

  const item = document.createElement('li');

  item.innerHTML = collectionHolder
    .dataset
    .prototype
    .replace(
      /__name__/g,
      collectionHolder.dataset.index
    );

    addAdresseFormDeleteLink(item);

  collectionHolder.appendChild(item);

  collectionHolder.dataset.index++;
};

document
  .querySelectorAll('.add_item_link')

  .forEach(btn => {
      btn.addEventListener("click", addFormToCollection)
  });

    document
    .querySelectorAll('ul.adresse li')
    .forEach((adresse) => {
        addAdresseFormDeleteLink(adresse);
    })
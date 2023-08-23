const addAdresseFormDeleteLink = (item) => {
  const removeFormButton = document.createElement('button');
  removeFormButton.innerText = 'Delete this tag';

  item.append(removeFormButton);

  removeFormButton.addEventListener('click', (e) => {
      e.preventDefault();
      // remove the li for the tag form
      item.remove();
  });
}

const addFormToCollection = (e) => {
  const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);

  const item = document.createElement('li');
  // const item = document.createElement('div');

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
  .querySelectorAll('ul.adresse .img-form-container')
  .forEach((item) => {
      addImageFormDeleteLink(item);
  })
    document
    .querySelectorAll('ul.adresse li')
    .forEach((adresse) => {
        addAdresseFormDeleteLink(adresse);
    })
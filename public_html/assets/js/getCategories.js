async function getCategories() {
  const url = "/category/list";
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    const categories = await response.json();
    console.log(categories);
    const dropdown = document.getElementById('category-dropdown');
    for(const category of categories){
      const
          listElement = document.createElement('li');
      if(category.subcategories.length){
        const
          ul = document.createElement('ul'),
          anchor = document.createElement('a');

          listElement.classList.add("dropdown-submenu");
          listElement.classList.add("dropend");

          listElement.addEventListener('click', function (e) {
            console.log("asdf",e);
            
              e.preventDefault();
              e.stopPropagation();
              const submenu = this.nextElementSibling;
              submenu.classList.toggle('show');
          });
          ul.classList.add('dropdown-menu');
          anchor.href = '#';
          anchor.classList.add('dropdown-item');
          anchor.classList.add('dropdown-toggle');
          anchor.setAttribute('data-bs-toggle', 'dropdown');
          anchor.textContent = category.name;
          ul.classList.add('dropdown-menu');

          listElement.appendChild(anchor);
        for(const subcategory of category.subcategories){
          const
              innerListElement = document.createElement('li'),
              innerLink = document.createElement('a');

            innerListElement.addEventListener('click', function (e) {
            
              e.preventDefault();
              e.stopPropagation();
              window.location.href = "/category/" + subcategory.id;
              // const submenu = this.nextElementSibling;
              // submenu.classList.toggle('show');
          });
          innerLink.classList.add('dropdown-item');
          innerLink.href = "/category/" + subcategory.id;
          innerLink.textContent = subcategory.name;
          innerListElement.appendChild(innerLink);
          ul.appendChild(innerListElement);   
          
        }

        dropdown.appendChild(ul);
        listElement.appendChild(ul);
        // listElement.appendChild(link);
        dropdown.appendChild(listElement);    
        // link.classList.add('dropdown-item');
      } else {
            link = document.createElement('a');

        link.classList.add('dropdown-item');
        link.href = "/category/" + category.id;
        link.textContent = category.name;
        listElement.appendChild(link);
        dropdown.appendChild(listElement);    
      }
        
    }
  } catch (error) {
    console.error(error.message);
  }
}

// Manejar el comportamiento del subdropdown
document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function (element) {

  console.log(element);
  
   
});
getCategories();

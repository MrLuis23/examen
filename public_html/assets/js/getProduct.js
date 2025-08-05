async function getData() {
  const scriptUrl = document.currentScript.src;
  const uruta = new URL(scriptUrl);
  const id = uruta.searchParams.get('id'); 
  
  const url = "/product/get/" + id;
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    const
      data = await response.json(),
      product = data["product"],
      comments = data["commments"];


    const
      img = document.getElementById('product-image'),
      title = document.getElementById('product-title'),
      price = document.getElementById('product-price'),
      description = document.getElementById('product-description'),
      contenedorComentarios = document.getElementById('comments');

    for(const comment of comments){
        const
            div = document.createElement('div'),
            userName = document.createElement('p'),
            text = document.createElement('p');
        
        div.className = "comment";
        userName.className = "comment-author";
        text.className = "comment-text";
        userName.textContent = comment.user_name;
        text.textContent = comment.text;

        div.appendChild(userName);
        div.appendChild(text);
        contenedorComentarios.appendChild(div);
    }  

    img.src = "https://picsum.photos/seed/" + product.id + "/600/200";
    title.textContent = product.name;
    price.textContent = "$" + product.price;

    const specifications = product.specifications.split(",");
    for(const specification of specifications){
      const el = document.createElement("li");
      el.textContent = specification;
      description.appendChild(el);
    }

    buildCards(contenedorDestacados, featuredProducts);

  } catch (error) {
    console.error(error.message);
  }
}

function buildComents(contenedor, products){
  
  for(const product of products){
      const
          divCol = document.createElement('div'),
          card = document.createElement('div'),
          img = document.createElement('img');
      
      divCol.className = "d-flex flex-row flex-nowrap";
      divCol.style = "width: 280px;"
      card.className = "card product-card mx-4 my-2";
      // card.style = "width: 3px;"
      img.src = "https://picsum.photos/seed/" + product.id + "/200";

      // img.style = "width: 300px; height: 300px;"
      img.className = "card-img-top";

      const cardBody = document.createElement('div');
      cardBody.className = "card-body";

      const cardTitle = document.createElement('h5');
      cardTitle.className = "card-title";
      cardTitle.textContent = product.name;

      const cardText = document.createElement('p');
      cardText.className = "card-text";
      // cardText.textContent = "Some quick example text to build on the card title and make up the bulk of the card’s content.";

      const cardLink = document.createElement('a');
      cardLink.href = "/product/" + product.id;
      cardLink.className = "btn btn-primary";
      cardLink.textContent = "Ver Detalles";

      cardBody.appendChild(cardTitle);
      cardBody.appendChild(cardText);
      cardBody.appendChild(cardLink);

      card.appendChild(img);
      card.appendChild(cardBody);
      divCol.appendChild(card);
      contenedor.appendChild(divCol);
  }  
}
getData();


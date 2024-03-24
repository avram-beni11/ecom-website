"use strict";

//Globals
window.onload = loadBasket;

//retrieve custoemr basket from session storage
function retrieveCustBasket() {
  let basket;
  if (sessionStorage.basket === undefined || sessionStorage.basket === "") {
    basket = []; // if basket does not exist in session storage then create one
  } else {
    basket = JSON.parse(sessionStorage.basket);
  }
  return basket;
}
let basket = retrieveCustBasket(); //create basket

// array to count how many duplicate IDs are stored in it
const countQuantity = [];

for (let i = 0; i < basket.length; ++i) {
  countQuantity.push(basket[i].id); // push all ids stored in basket in array
}
console.log("All IDs in Basket: " + countQuantity); // log contents

countQuantity.forEach(function (id) {});

const countIDs = {};
countQuantity.forEach(function (ids) {
  countIDs[ids] = (countIDs[ids] || 0) + 1; // count duplicates in array
});

const convertJSON = JSON.stringify(countIDs); // convert to string
console.log(convertJSON);

let obj = JSON.parse(convertJSON);
console.log(convertJSON);

for (let i = 0; i < basket.length; i++) {
  console.log("Quantity: " + obj[basket[i].id]); // calculates the quantity of different products
}

function loadBasket() {
  let request = new XMLHttpRequest();
  request.onload = function () {
    if (request.status === 200) {
      //Check HTTP status code
      let responseData = request.responseText;

      //Add data to page
      document.getElementById("ServerContent").innerHTML = responseData;
    }
  };

  let htmlHidden = "<form action='checkout.php' method='post'>";
  let prodIDs = [];

  let rows =
    "<table><tr><th class='thName'>Name</th class='thName'><th>Console</th><th class='thName'>Price</th><th class='thName'>Quantity</th></tr>";

  for (let i = 0; i < basket.length; ++i) {
    rows = `${rows} <tr><td class="name"> ${
      basket[i].name // display all product names in basket table
    } </td><td class="console"> <img class="ps5Logo" src="${
      basket[i].console // display all product consoles in basket table
    } " </td><td class="price"> £${
      basket[i].price // display all product prices in basket table
    } </td><td class="quantity"> ${obj[basket[i].id]}</td><td></tr>`;

    prodIDs.push({ id: basket[i].id, count: 1, name: basket[i].name }); //Add to product array
  }

  rows = `${rows} </table>`;

  //Add hidden field to form that contains stringified version of product ids.
  htmlHidden +=
    "<input type='hidden' name='prodIDs' value='" +
    JSON.stringify(prodIDs) +
    "'>";

  //Add checkout and empty basket buttons
  htmlHidden += "<input type='submit' value='Checkout'></form>";
  htmlHidden +=
    "<br><button id='rm' onclick='emptyBasket()'>Delete Items</button>";
  document.getElementById("rm");

  //Display nubmer of products in basket
}
//-----------------------------------------------------------------------------
/* Function to calculate total of prices */
function total(cart) {
  let sum = 0;
  for (let i = 0; i < cart.length; ++i) {
    sum = sum + parseFloat(cart[i].price); // convert string to float
  }
  let finalTotal = Math.round(sum * 100) / 100; // round value
  console.log(finalTotal);
}
total(basket);

/* Function to calculate total items */
function totalItems(cart) {
  let count = 0;
  for (let i = 0; i < cart.length; ++i) {
    count++;
  }
  console.log(count);
}
totalItems(basket);
//-----------------------------------------------------------------------------

let count = 0;
for (let i = 0; i < basket.length; ++i) {
  console.log(basket[i].id);
}

//Adds an item to the basket
function addToBasket(prodID, prodName, prodConsole, prodPrice, prodQuantity) {
  let basket = retrieveCustBasket(); //Load or create basket

  basket.push({
    id: prodID,
    name: prodName,
    console: prodConsole,
    price: prodPrice,
    quantity: prodQuantity,
  });

  sessionStorage.basket = JSON.stringify(basket);

  //Display basket in page
  loadBasket();
}

//Deletes all products from basket
function emptyBasket() {
  sessionStorage.clear();
  loadBasket();
}

"use strict";

window.onload = createBasket;

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

/* Function to create basket by creating a table to store 
    appropriate data */
function createBasket() {
  //Build string with basket HTML
  let htmlForm = "<form action='checkout.php' method='post'>"; // input button takes user to checkout page
  let prodIDs = []; // empty array to store product data and send to server

  let tableRows = // display info in table
    "<table><tr><th class='thName'>Name</th class='thName'><th>Console</th><th class='thName'>Price</th><th class='thName'>Quantity</th></tr>";

  for (let i = 0; i < basket.length; ++i) {
    tableRows = `${tableRows} <tr><td class="name"> ${
      basket[i].name // display all product names in basket table
    } </td><td class="console"> <img class="ps5Logo" src="${
      basket[i].console // display all product consoles in basket table
    } " </td><td class="price"> £${
      basket[i].price // display all product prices in basket table
    } </td><td class="quantity"> ${obj[basket[i].id]}</td><td></tr>`;

    prodIDs.push({ id: basket[i].id, count: 1, name: basket[i].name }); //Add to product array
  }

  tableRows = `${tableRows} </table>`;

  //Add hidden field to contain and convert product IDs to string
  htmlForm +=
    "<input type='hidden' name='prodIDs' value='" +
    JSON.stringify(prodIDs) +
    "'>";

  //Add checkout and empty basket buttons
  htmlForm += "<input type='submit' value='Checkout'></form>";
  htmlForm +=
    "<br><button id='rm' onclick='emptyBasket()'>Delete Items</button>";
  document.getElementById("rm");
}

//Adds an item to the basket
function addToBasket(prodID, prodName, prodConsole, prodPrice, prodQuantity) {
  let basket = retrieveCustBasket(); //Load or create basket

  //Add product to basket
  basket.push({
    id: prodID,
    name: prodName,
    console: prodConsole,
    price: prodPrice,
    quantity: prodQuantity,
  });

  //Store in local storage
  sessionStorage.basket = JSON.stringify(basket);

  //Display basket in page.
  createBasket();
}

//Deletes all products from basket
function emptyBasket() {
  sessionStorage.clear();
  createBasket();
}

let basketContent = sessionStorage.basket;
console.log("Stored data in JSON " + basketContent); // logs all data stored in customer basket during checkout

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

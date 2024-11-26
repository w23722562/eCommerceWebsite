function ToDBView() {
    window.location.href = "display.php";
}

function backToStart() {
    window.location.href = "index.html";
}

function backToDisplay() {
    window.location.href = "display.php";
}

function add_product() {
    window.location.href = "form.php";
}

function productlisting() {
    window.location.href = "product_listing.php";
}

let basket = 0
const product_names = Array("placeholder")
const product_prices = Array("placeholder")
const product_quantities = Array("")
let amount = 0;
function addItem(name, price) {
    let basketOverlay = document.getElementById("open-basket");
    let found = false;
    let index = "";
 
    basket ++;
    document.getElementById("basket-number").innerHTML = basket;




    for (let i = 0; i < product_names.length; i++) {
        console.log(product_names[i])
        if (product_names[i] == name) {
            found = true;
            index = product_names.indexOf(name);
            break;
        }
        else {
            found = false;
        
        }
    }

    if (found == true) {
        product_quantities[index] += 1;
        amount = product_quantities[index];
        ;
    } else {
        product_names.push(name);
        product_prices.push(price);
        product_quantities.push(1);
        
        amount = product_quantities[index];

    }
    console.log(product_names);
    console.log(product_prices);
    console.log(product_quantities);
    

    let amount_items = product_names.length;
    let total = 0;
    for (let i = 1; i < amount_items; i++) {
        total += (parseFloat(product_prices[i]) * product_quantities[i]);
        console.log(total)
    }
    let displayTotal = document.getElementById("basketTotal");
    displayTotal.innerHTML = `Total: £ ${total.toFixed(2)}`;
}

function openCart() {
    let basketOverlay = document.getElementById("open-basket")
    basketOverlay.innerHTML = ""
    if (basketOverlay.style.display == "none" || basketOverlay.style.display == "") {
        basketOverlay.style.display = "block";
    } else if (document.getElementById("open-basket").style.display == "block") {
        basketOverlay.style.display = "none";
    }

    let amount_items = product_names.length;

    for (let i = 1; i < amount_items; i++) {
        basketOverlay.innerHTML += `<p> ${product_names[i]}-------${product_quantities[i]} </p>`
        basketOverlay.innerHTML += `<p> £ ${product_prices[i]} </p> <br>`
    }
}
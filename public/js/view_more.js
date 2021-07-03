// const images = ["p1.png", "p3.png", "p4.png", "p6.png", "p7.png", "p8.png"];

function viewMore(obj) {
    
    // to hide the button
    obj.style.display = "none";

    for (var i = 0; i < 3; i++) {

        const product = document.getElementById("card-"+(i+1));
        product.style.display = "inline";
    }
}

const input = document.getElementsByClassName("search_input")[0];
const form = document.getElementById("search-form");
const search = document.getElementsByClassName("search_icon")[0];

// if user press enters or click on the search icon, 
// this event and function will be tiggered and the searched data
//  will be displayed if the user query matches with any product name

input.addEventListener("keyup", function (event) {
    if (event.keyCode === 13) {
        form.submit();
    }
});

function submitUsingAnchorTag() {
    form.submit();
};

// AJAX - Search Suggestions
function ProductSuggestions() {
    let query = document.getElementById("input").value;
    // const searchInput = document.getElementById("input");
    //const searchSuggestions = document.getElementById("search_suggestion");

    searchProductReq = new XMLHttpRequest();
    let URL = "/search-request?product=" + query;
    searchProductReq.open("GET", URL);
    searchProductReq.send();

    var productImage = document.getElementById("product_image");
    //var productText = document.getElementById("product_text");
    //var priceText = document.getElementById("price_text");
    //var productDescription = document.getElementById("description");

    var button = document.getElementsByClassName("view-btn")[0];
    var form = document.getElementById("form");
    var productID = document.getElementById("productID");
    var h3 = document.getElementById("msg");
    //var viewProducts = document.getElementsByClassName("view_products")[0];

    // divs
    var productDiv = document.getElementsByClassName("products")[0];
    var searchedProductsDiv = document.getElementsByClassName("searched_products")[0];

    searchProductReq.onreadystatechange = function() {
        if(searchProductReq.readyState == 4 && searchProductReq.status == 200) {
            if(query.length != 0) {
                const JSONResponse = JSON.parse(searchProductReq.responseText);
                if (button.style.display == 'none') {
                    //console.log("ENABLED");
                    for(let i = 0; i < 4; i++) {
                        var viewProducts = document.getElementsByClassName("view_products")[i];
                        viewProducts.style.display = "none";
                    }
                }
                if(!jQuery.isEmptyObject(JSONResponse)) {
                    productDiv.style.display = "none";
                    button.style.display = "none";
                    searchedProductsDiv.style.display = "inline";
                    //console.log(JSONResponse[0]["name"]);
                    form.action = "/products/" + JSONResponse[0]["id"];
                    productID.value = JSONResponse[0]["id"];
                    productImage.src = JSONResponse[0]["image"];
                    $("#product_text").text(JSONResponse[0]["name"]);
                    $("#price_text").text(JSONResponse[0]["price"]);
                    $("#description").text(JSONResponse[0]["description"]);
                    h3.style.display = "none";
                    // for(let response in JSONResponse) {
                    //     //console.log(JSONResponse[response]);

                    //     // $("#product_text").append(response.getString("name"));

                    //     // productImage.src = JSONResponse[response].image;
                    //     // productText.append = JSONResponse[response].name;
                    //     // priceText.append = JSONResponse[response].price;
                    //     // productDescription.append = JSONResponse[response].description;

                    //     // $("#image").append('<img class="card-img-top" src="' + 
                    //     //     JSONResponse[response].image + '" alt=""..">' + 
                    //     //     '"<h2 class="card-title">' + JSONResponse[response].name + '</h2>"' + 
                    //     //     '<h3 class="card-title">' + JSONResponse[response].price + '</h3>' + 
                    //     //     '"<p class="card-text">' + JSONResponse[response].description + '</p>"'
                    //     // );
                    // }
                } else {
                    h3.style.display = "inline";
                    $("#msg").text("Sorry... This product is not available... :(");
                    searchedProductsDiv.style.display = "none";
                }
            } else {
                productDiv.style.display = "inline-block";
                searchedProductsDiv.style.display = "none";
                button.style.display = "inline";
            }
        }
    };

};

// function addProductImage(index) {
//     // creating an image element, adding a source and classes to it
//     const image = document.createElement("img");
//     image.src = "/images/" + images[index];
//     image.classList.add("card-img-top", "product-image");

//     // creating a card element and adding classes to it and append the
//     // above created image, as a child element to it
//     const card_image = document.getElementById("card-image");
//     const classesForCard = ["card", "mb-3", "text-center"];
//     card_image.classList.add(...classesForCard);
//     card_image.appendChild(image);

//     return card_image;
// }

// function addProductDetails() {

//     // creating a card body element and adding classes to it
//     // also creating the elements of card body and adding classes to those
//     // elements and at the end, appending those elements as children to the
//     // card body
//     const card_body = document.getElementById("card-info");
//     card_body.classList.add("card-body");

//     const h2 = document.createElement("h2");
//     const h3 = document.createElement("h3");
//     const p = document.createElement("p");

//     const classesForH2 = ["card-title", "product-text"];
//     h2.classList.add(...classesForH2);

//     const classesForH3 = ["card-title", "price-text"];
//     h3.classList.add(...classesForH3);

//     p.classList.add("card-text");

//     h2.textContent = "Product Name";
//     h3.textContent = "Rs. 999";
//     p.textContent = "Lorem Ipsum Lorem Ipsum Lorem";

//     card_body.appendChild(h2);
//     card_body.appendChild(h3);
//     card_body.appendChild(p);

//     return card_body;
// }   



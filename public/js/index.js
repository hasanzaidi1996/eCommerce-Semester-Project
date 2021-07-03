function disable(button) {
    // let parent = button.parentElement;
    
    // let childNodes = parent.childNodes;
    
    // let productName = childNodes[1].textContent;
    // let price = childNodes[3].textContent;
    // let description = childNodes[5].textContent;

    // let product_body = document.getElementById("product-body");
    // let length = product_body.rows.length;

    // const row = document.createElement("tr");
    // const cell_1 = document.createElement("td");
    // const cell_2 = document.createElement("td");
    // const cell_3 = document.createElement("td");

    // cell_1.innerHTML = productName;
    // cell_2.innerHTML = price;

    // product_body.appendChild(cell_1);
    // product_body.appendChild(cell_2);

    
    // let childName = button.parentElement.firstElementChild.textContent;
    // console.log(childName);
    // return childName;
    
    
    //button.disabled = true;
    let cart_count = document.getElementsByClassName('cart-count')[0];
    let count = cart_count.firstElementChild;
    count.classList.add("badge", "bg-danger");

    // if (count.textContent == "") {
    //     count.textContent = "1";
    // } else {
    //     let num = parseInt(count.textContent);
    //     num++;
    //     count.textContent = String(num);
    // }
}


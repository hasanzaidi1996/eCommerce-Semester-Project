// created an object of regex expressions for billing form validation

// const patterns = {
//     firstName: /^[a-zA-Z]{3,10}$/i,
//     lastName: /^[a-zA-Z]{3,10}$/i,
//     username: /^[a-zA-z0-9]{5,12}$/i,
//     email: /^([a-z0-9\.-]+)@([a-z0-9-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
//     address: /^[a-zA-z0-9]{5,12}$/i
// };

// // this function is used to validate the specific field of the form
// function validate(field) {
//     if (patterns[field.name].test(field.value)) {
//         field.className = "valid-field";
//     } else {
//         field.className = "invalid-field";
//     }
// }

function checkPaymentMethod(input) {

    let paymentMethod = input.id;

    if(paymentMethod == "cash") {
        // console.log(input.checked);
        document.getElementById("payment").style.display = "none";
    } else {
        document.getElementById("payment").style.display = "inline";
    }
}


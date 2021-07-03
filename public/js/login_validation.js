// created an object of regex expressions for login form validation

const patterns = {
    username: /^[a-zA-z0-9]{5,12}$/i,
    password: /^[a-zA-Z0-9@\-#$]{8,20}$/i,
};

// this function is used to validate the specific field of the form
function validate(field) {
    if (patterns[field.name].test(field.value)) {
        field.className = "valid-field";
    } else {
        field.className = "invalid-field";
    }
}

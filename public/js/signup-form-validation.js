// created an object of regex expressions for sign up form validation

const patterns = {
    firstName: /^[a-zA-Z]{3,10}$/i,
    lastName: /^[a-zA-Z]{3,10}$/i,
    username: /^[a-zA-z0-9]{5,12}$/i,
    email: /^([a-z0-9\.-]+)@([a-z0-9-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
    password: /^[a-zA-Z0-9@\-#$]{8,20}$/i
};

// this function is used to validate the specific field of the form
function validate(field) {
    if (patterns[field.name].test(field.value)) {
        field.className = "valid-field";
    } else {
        field.className = "invalid-field";
    }
}

function addProfilePic(field) {
    const profile = document.getElementById("profile");
    const inputFile = document.getElementById("file");

    // the files property returns a filelist object which represents the file or
    // files that are selected by the user while clicking on the browse button
    const file = inputFile.files[0]; // accessing just one file from the list

    if (file) {
        if (file.name.includes("png") || file.name.includes("jpg")) {
            // creates a DOMString containing a URL representing the object given
            // in the parameter. The parameter could be a file, image, etc
            profile.src = URL.createObjectURL(file);
            profile.style.display = "inline";
            field.className = "valid-field";
        } else {
            field.className = "invalid-field";
            // console.log("Enter a valid file");
        }
    } else {
        alert("ERROR");
    }
}

const username = document.getElementsByClassName("input-data")[0];
const password = document.getElementsByClassName("input-data")[1];
const user = document.getElementsByClassName("inputs")[0];
const pass = document.getElementsByClassName("inputs")[1];

function addProfilePic() {
    const profile = document.getElementById("profile-image");
    const inputFile = document.getElementById("file");

    // the files property returns a filelist object which represents the file or
    // files that are selected by the user while clicking on the browse button
    const file = inputFile.files[0]; // accessing just one file from the list

    if (file) {
        if (file.name.includes("png") || file.name.includes("jpg")) {
            // creates a DOMString containing a URL representing the object given
            // in the parameter. The parameter could be a file, image, etc
            console.log(file.name);
            profile.src = URL.createObjectURL(file);
            // profile.style.display = "inline";
            // field.className = "valid-field";
        } else {
            // field.className = "invalid-field";
            // console.log("Enter a valid file");
        }
    } else {
        alert("ERROR");
    }
}

function editProfile(field) {
    field.disabled = true;
    const profileInput = document.getElementsByName("profile_pic")[0];
    // console.log(profileInput);
    profileInput.style.display = "inline";

    username.style.display = "inline";
    password.style.display = "inline";

    user.style.display = "none";
    pass.style.display = "none";
}

function done() {
    const editBtn = document.getElementsByClassName("edit-btn")[0];
    editBtn.disabled = false;
    const profileInput = document.getElementsByName("profile_pic")[0];
    profileInput.style.display = "none";

    // const inputFile = document.getElementById("file");
    // const profileImage = inputFile.files[0].name;
    // let uID = $(obj).data("id");
    // console.log(profileImage);
    // console.log(uID);
    
    user.style.display = "block";
    pass.style.display = "block";

    username.style.display = "none";
    password.style.display = "none";

    // console.log(username, password, user, pass);
}

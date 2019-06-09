var password = document.forms['vform']['password'];
var apass = document.forms['vform']['apass'];
var password_confirm = document.forms['vform']['password_confirm'];


var apassword_error = document.getElementById('apassword_error');
var password_error = document.getElementById('password_error');




apass.addEventListener('blur', apassVerify, true);
password.addEventListener('blur', passwordVerify, true);

function Validate() {


        if (apass.value == "") {
        apass.style.border = "1px solid red";
        document.getElementById('apassword_div').style.color = "red";
        apassword_error.textContent = "Mot de passe est obligatoire";
        apass.focus();
        return false;
    }
    
    
    // validate password
    if (password.value.length == 0) {
        password.style.border = "1px solid red";
        document.getElementById('pass_confirm_div').style.color = "red";
        password_error.textContent = "Mot de passe obligatoire";
        password.focus();
        return false;
    }
    
    
    
        if (password.value != password_confirm.value) {
        password.style.border = "1px solid red";
        document.getElementById('pass_confirm_div').style.color = "red";
        password_confirm.style.border = "1px solid red";
        password_error.innerHTML = "les 2 mots de passe ne sont pas identiques";
        return false;
    }

}
// event handler functions
function apassVerify() {
    if (apass.value != "") {
        apass.style.border = "1px solid #5e6e66";
        document.getElementById('apassword_div').style.color = "#5e6e66";
        apassword_error.innerHTML = "";
        return true;
    }
}

function passwordVerify() {
    if (password.value != "") {
        password.style.border = "1px solid #5e6e66";
        document.getElementById('pass_confirm_div').style.color = "#5e6e66";
        document.getElementById('password_div').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }
    if (password.value === password_confirm.value) {
        password.style.border = "1px solid #5e6e66";
        document.getElementById('pass_confirm_div').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }
}


function show(){
    document.getElementById("pass").setAttribute("type", "text");
    document.getElementById("passc").setAttribute("type", "text");
    document.getElementById("apass").setAttribute("type", "text");

    
}

function hide(){
     document.getElementById("apass").setAttribute("type","password");
         document.getElementById("pass").setAttribute("type","password");
     document.getElementById("passc").setAttribute("type","password");
    //alert("bonjour");
}

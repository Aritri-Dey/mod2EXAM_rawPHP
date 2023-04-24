/**
 * Function for frontend validation of login form.
 * 
 *  @return bool
 *    TRUE or FLASE depending on condition satisfaction. 
 */
function checkValid() {
  var userNameLogin = document.forms["loginForm"]["userNameLogin"].value;
  var emailLogin = document.forms["loginForm"]["emailLogin"].value;
  var passwordLogin = document.forms["loginForm"]["passwordLogin"].value;

  if (userNameLogin == null) {
    $("#err").text("Enter username");
     return FALSE;
  }
  else if (emailLogin == null) {
    $("#err").text("Enter a email id");
    return FALSE;
  }
  else if (passwordLogin == null) {
    $("#err").text("Enter a password");
    return FALSE;
  }
  return TRUE;
}

/**
 * Function for frontend validation of regsitration form.
 * 
 *  @return bool
 *    TRUE or FALSE depending on condition satisfaction. 
 */
function checkRegiater() {
  var userName = document.forms["registerForm"]["userName"].value;
  var email = document.forms["registerForm"]["email"].value;
  var password = document.forms["registerForm"]["password"].value;
  var conPassword = document.forms["registerForm"]["conPassword"].value;
  const alphabetRegex = /^[a-zA-Z]+$/;

  if (userName == null || !alphabetRegex.test(userName)) {
    $("#err").text("Enter proper username");
     return FALSE;
  }
  else if (email == null) {
    $("#err").text("Enter a valid email id");
    return FALSE;
  }
  else if (password == null) {
    $("#err").text("Enter a password");
    return FALSE;
  }
  else if (password != conPassword) {
    $("#err").text("Password and confirm password does not match");
    return FALSE;
  }
  return TRUE;
}


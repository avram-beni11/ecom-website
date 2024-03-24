
let logoutMsgHtml = "Staff Member Logged in <button class='loginBtn' onclick='logout()'>Logout</button>";
let httpRequest = new XMLHttpRequest();

//Check login when page loads
window.onload = loginCheck;

//This function is used to see if staff is logged in
function loginCheck() {
  httpRequest.onload = function () {
    if (httpRequest.responseText === "Access Authorised") { // if access is authorised then logout button provided
      document.getElementById("displayMsg").innerHTML = logoutMsgHtml; 
    } 
  };
  //send request to page to check if a user is logged in or not
  httpRequest.open("GET", "checkAccess.php");
  httpRequest.send();
}

//This function is used to log a user out 
function logout() {

  //send request to page to logout staff member
  httpRequest.open("GET", "logout.php");
  httpRequest.send();
}
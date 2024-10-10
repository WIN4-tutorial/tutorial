
window.onload = function() {
  const passwordProtection = document.getElementById("password-protection");
  const content = document.getElementById("content");
  const password = sessionStorage.getItem("password");


  if (password === "WIN4_tutorial") {
      passwordProtection.style.display = "none";
      content.classList.remove("hidden");
  }
};

function checkPassword() {
  const passwordInput = document.getElementById("password").value;
  if (passwordInput === "WIN4_tutorial") {
      sessionStorage.setItem("password", passwordInput);
      document.getElementById("password-protection").style.display = "none";
      document.getElementById("content").classList.remove("hidden");
  } else {
      alert("Falsches Passwort!");
  }
}

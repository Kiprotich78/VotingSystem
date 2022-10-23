const form1 = document.querySelector("#logIn form");
const logInBtn = form1.querySelector("#logIn button");

form1.onsubmit = (e) => {
  e.preventDefault();
};

logInBtn.addEventListener("click", () => {
  const formData = new FormData(form1);
  //console.log(formData);
  fetch("../VotingSystem/php/logIn.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => {
      return res.text();
    })
    .then((res) => {
      if (res == "success") {
        window.location.replace("../VotingSystem/vote");
      } else {
        document.querySelector(".err").textContent = res;
        document.querySelector(".err").style.display = "block";
      }
    })
    .catch((err) => {
      console.log(err.message);
    });
});

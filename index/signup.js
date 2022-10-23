const form2 = document.querySelector("#signUp form");
const signUpBtn = form2.querySelector("#signUp button");

form2.onsubmit = (e) => {
    e.preventDefault();
}

signUpBtn.addEventListener('click', () => {
    const formData = new FormData(form2);
    fetch("../VotingSystem/php/signUp.php", {
        method: 'POST',
        body: formData
    })
        .then((res) => {
            return res.text();
        })
        .then((res) => {
            if (res == "Success") {
                window.location.replace("../VotingSystem/vote");
            } else {
                document.querySelector(".err").textContent = res;
                document.querySelector(".err").style.display = "block";
            }
        })
        .catch((err) => {
            console.log(err.message());
        })

})


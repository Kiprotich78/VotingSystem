const btn = document.querySelectorAll("button");
const submitVoteBtn = document.querySelector('.submit');
let candidateID;

checkVote();

btn.forEach((e, index) => {
    e.addEventListener("click", () => {
        candidateID = index;
        submitVoteBtn.classList.add('voting');
        btn.forEach((element =>{
            if(element.classList.contains("active")){
                element.classList.remove("active");
            }
        }));
        e.classList.add("active");
    })
})

submitVoteBtn.addEventListener("click", () => {

    formData = new FormData();
    formData.append("candidateID", candidateID);
    submitVote(formData);

    submitVoteBtn.classList.remove("voting");
    submitVoteBtn.textContent = "You Have Voted successfully!!";
    btn.forEach((e)=>{
        e.classList.remove('active');
        e.classList.add("voted");
    })
    window.location.reload();
    
});

function checkVote() {
    fetch('../php/checkVote.php')
        .then((res) => {
            return res.text();
        })
        .then((res) => {
            if (res == "voted") {
                btn.forEach((e, index) => {
                    e.classList.add('active');
                    getVotes(index);
                })
                document.querySelector('.submit').textContent = "Thanks For Your Vote!!";
            }
        })
        .catch((err) => {
            console.log(err.message);
        })
}

function submitVote(data) {
    fetch('../php/submitVote.php', {
        method: 'POST',
        body: data
    })
        .then((res) => {
            return res.text();
        })
        .then((res) => {
            console.log(res);
        })
        .catch(err => console.log(err.message));
}

function getVotes(data) {
    formData = new FormData();
    formData.append("candidateID", data);

    fetch('../php/getVotes.php', {
        method: 'POST',
        body: formData
    })
        .then((res) => {
            return res.text();
        })
        .then((res) => {
            btn[data].textContent = `Votes: ${res}`;
        }).catch(err => console.log(err.message));
    
}
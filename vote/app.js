const btn = document.querySelectorAll("button");
const submitVoteBtn = document.querySelector('.submit');
let candidateID;
btn.forEach((e, index) => {
    e.addEventListener("click", () => {
        candidateID = index + 1;
        console.log(candidateID);
        submitVoteBtn.classList.add('voting');
        btn.forEach((element =>{
            if(element.classList.contains("active")){
                element.classList.remove("active");
            }
        }));
        e.classList.add("active");
    })
})

submitVoteBtn.addEventListener("click", ()=>{
    submitVoteBtn.classList.remove("voting");
    submitVoteBtn.textContent = "You Have Voted successfully!!";
    btn.forEach((e)=>{
        e.classList.remove('active');
        e.classList.add("voted");
    })
});

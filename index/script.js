const toggleWindow = document.querySelectorAll(".switch");
const logInfields = document.querySelectorAll("#logIn input");
const signUpFields = document.querySelectorAll("#signUp input");
const btns = document.querySelectorAll("button");

setPage();

function setPage() {
    toggleWindows();
    validateFields(logInfields, 0);
    validateFields(signUpFields, 1);
}



function toggleWindows() {
    toggleWindow.forEach((element, index) => {
        element.addEventListener('click', () => {
            if (index == 0) {
                document.getElementById("logIn").style.transform = "translateX(-100%)";
                document.getElementById("signUp").style.transform = "translateX(0)";
            }
            else {
                document.getElementById("logIn").style.transform = "translateX(0)";
                document.getElementById("signUp").style.transform = "translateX(100%)";
            }
        });
    });
}

function validateFields(inputs, index) {
    inputs.forEach((e) => {
        e.addEventListener('keyup', () => {
            let num = 0;
            inputs.forEach((element) => {
                if (element.value) {
                    num++;
                }
            });
            if (num === inputs.length) {
                if (index == 1) {
                    if (inputs[1].value == inputs[2].value) {
                        btns[index].classList.add("active");
                        document.querySelector('.err').style.display = "none";
                    } else {
                        btns[index].classList.remove("active");
                        document.querySelector('.err').style.display = "block";
                    }
                } else {
                    btns[index].classList.add("active");
                }
                
            } else {
                btns[index].classList.remove("active");
            }
            
        });

    });

}



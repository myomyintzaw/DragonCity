// const password = document.getElementById("pas");
// const toggle = document.getElementById("toggle");
// const bar = document.querySelector(".strength-bar span");
// const strengthText = document.getElementById("strength-text");

// toggle.addEventListener("click", () => {
//     if (password.type === "password") {
//         password.type = "text";
//         toggle.textContent = "HIDE";
//     } else {
//         password.type = "password";
//         toggle.textContent = "SHOW";
//     }
// });

// password.addEventListener("keyup", () => {
//     let val = password.value;
//     let strength = 0;

//     if (val.match(/[a-z]+/)) strength++;
//     if (val.match(/[A-Z]+/)) strength++;
//     if (val.match(/[0-9]+/)) strength++;
//     if (val.match(/[$@#&!]+/)) strength++;
//     if (val.length >= 8) strength++;

//     // Update bar and text
//     if (val.length === 0) {
//         bar.style.width = "0";
//         strengthText.textContent = "";
//     } else if (strength <= 2) {
//         bar.style.width = "33%";
//         bar.style.background = "red";
//         strengthText.textContent = "Your password is weak";
//         strengthText.style.color = "red";
//     } else if (strength === 3 || strength === 4) {
//         bar.style.width = "66%";
//         bar.style.background = "orange";
//         strengthText.textContent = "Your password is medium";
//         strengthText.style.color = "orange";
//     } else {
//         bar.style.width = "100%";
//         bar.style.background = "green";
//         strengthText.textContent = "Your password is strong";
//         strengthText.style.color = "green";
//     }
// });









/* <script>
        const indicator = document.querySelector(".indicator");
        const input = document.querySelector(".input");
        const weak = document.querySelector(".weak");
        const medium = document.querySelector(".medium");
        const strong = document.querySelector(".strong");
        const text = document.querySelector(".text");
        let regExpWeak = /[a-z]/;
        let regExpMedium = /\d+/;
        let regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,`,(,)]/;

        function trigger(){

            if (input.value != "") {
                indicator.style.display = "block";
                indicator.style.display = "flex";
                if (input.value.length <= 3 && (input.value.match(regExpWeak) || input.value.match(regExpMedium) || input
                        .value.match(regExpStrong))) no = 1;
                if (input.value.length >= 6 && ((input.value.match(regExpWeak) && input.value.match(regExpMedium)) || (input
                            .value.match(regExpMedium) input.value.match(regExpStrong)) ||
                        (input.value.match(regExpWeak) && input.value.match(regExpStrong)))) no = 2;
                if (input.value.length >= 6 && input.value.match(regExpWeak) && input.value.match(regExpMedium) && input
                    .value.match(regExpStrong)) no = 3;

                if (no == 1) {
                    weak.classList.add("active");
                    text.style.display = "block";
                    text.textContent = "Your password is too week";
                    text.classList.add("weak");
                }

            } else {
                indicator.style.display = "none";

            }
        }
    </script> */

//  <div class="indicator">
//                             <span class="weak"></span>
//                             <span class="medium"></span>
//                             <span class="strong"></span>
//                         </div>
//                         <div class="text"></div>

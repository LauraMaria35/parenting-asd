let signUpBox = document.querySelector("#signUpBox");
let emailIcon = document.querySelector(".emailIcon");

function signUp() {
    signUpBox.innerHTML = `<h3>Sign up for free today!</h3>
            <br>
                <div class="signUpEmail">
                    <form action="">
    <input type="email" name="email" id="email">
    <input type="submit" value="sign up">
</form>
                        </div>`;
};
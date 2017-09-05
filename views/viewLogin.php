<?php
    require_once (ROOT.'/views/viewHeader.php');
?>
    <header>
        <div class="crm-logo">
            <img src="./public/images/favicon.png" alt="crm-logo">
            <h1>crm-box</h1>
        </div>
        <div id="time" class="container">
            <p class="" id="digital_watch"></p>
        </div>
    </header>
    <div class="form_login">
        <div id="login_form">
            <div id="main_login">
                <div id="login_error"></div>
                <div class="input_div">
                    <input type="text" name="login" placeholder="Login" />
                    <input type="password" name="passwd" placeholder="Password" /><br>
                    <div class="forgot_div">
                        <p id="forgot_passwd">Forgot password?</p>
                    </div>
                </div>
                <div class="button_login">
                    <button id="enter_login" type="submit" name="enter_login">Sign In</button>
                    <div id="registration_login">
                        <p>Registration</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="forgot_passwd_form">
            <div id="msg-forgot"></div>
            <input type="email" name="email" placeholder="Email" />
            <button id="do_forgot" type="submit" name="do_forgot">Send</button>
            <div class="back_but">
                <p>Back</p>
            </div>
        </div>
        <div id="registr_form">
            <div id="register_error"></div>
            <input type="text" name="login" placeholder="Login" required/>
            <input type="email" name="email" placeholder="Email" required/>
            <input type="password" name="passwd" placeholder="Password" required/>
            <input type="password" name="rep_passwd" placeholder="Confirm password" required/>
            <button type="submit" id="reg_account" name="do_signup">Sign Up</button>
            <div class="back_but">
                <p>Back</p>
            </div>
        </div>
    </div>
<?php
    require_once (ROOT.'/views/viewFooter.php');
?>

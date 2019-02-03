<form action="/forgot/" method="post" name="recovery"> 
    <fieldset id="recovery">
        <?php if ($not == "2"): ?>                        
        <legend><h4>Sorry, this password is wrong. Try again or register</h4></legend>
        <div>
            <label for="emailRec">Please input your email:</label>
            <input id="emailRec" type="email" name="emailRec" placeholder="Your Email" required> 
        </div>
        <button type="submit" name="Recovery" class="Btn">Send new password</button>
        <a href="/register" target="_self" class="Btn1">Register</a>
        <?php elseif ($not == false): ?>
        <legend><h4>Recovery your password</h4></legend>
        <div>
            <label for="emailRec">Please input your email:</label>
            <input id="emailRec" type="email" name="emailRec" placeholder="Your Email" required> 
        </div>
        <button type="submit" name="Recovery" class="Btn">Send new password</button>
        <a href="/register" target="_self" class="Btn1">Register</a>
        <?php else :?>
        <legend><h4>Wait a few minutes and check your email :-)</h4></legend>
        <?php endif; ?>
        <a href="/" target="_self" class="Btn1" id="BtnEnter">back</a>
    </fieldset>  
</form> 

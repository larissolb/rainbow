<?php if ($answer == 'USER_ADDED'){header("Location: /share");exit;}?>

<form action="/register/" method="post" name="create">
    <fieldset id="create">
    <legend><h4>Creat an account</h4></legend>
        <div>
            <label for="loginReg">Your name</label> 
            <?php if ($answer[1] == 'LOGIN_EXISTS') :?>
            <div id="red"><?php echo $answer[0] . ' is occupied!'; ?></div>
            <input id="loginReg" type="text" name='login' placeholder='<?php echo $answer[0]; ?>' required>
            <?php else : ?>
            <input id="loginReg" type="text" name='login' placeholder='your name' required>
        </div>
        <?php endif; ?>
        <div>
            <label for="emailReg">Your email</label> 
            <input id="emailReg" type="email" name="email" placeholder="Your email" required>
        </div>
        <div id="busyEmail">It is occupied!</div>
        <div>
            <label for="pswReg">Your password</label> 
            <?php if ($answer == 'PSW_WRONG') :?>
            <div id="red"><?php echo 'Your password is wrong. Password must content min 5 characters, 1 upper letter and 1 number'; ?></div> 
            <input id="pswReg" type="password" name='psw' placeholder="Your password" required>
            <?php else :?>
            <input id="pswReg" type="password" name='psw' placeholder="Your password" required>
        </div>
        <div id="info">Password must content min 5 characters, 1 upper letter and 1 number</div>
        <?php endif; ?>
        <div><label for="country">Your country</label>
            <?php if ($answer == 'COUNTRY_EMPTY') :?>
            <div id="red"><?php echo 'Choose your country'; ?></div> 
            <?php endif; ?>
            <select id="country" name='country' required> 
                <option>Choose country</option> 
                    <optgroup label="Europe"> 
                    <option value="E1">Portugal</option> 
                    <option value="E2">Spain</option> 
                    <option value="E3">France</option> 
                    <option value="E4">Italy</option>
                    <option value="E5">Germany</option>
                    <option value="E6">Great Britain</option>
                    <option value="E7">Russia</option>
                    </optgroup>
                    <optgroup label="Asia">
                    <option value="A1">Japan</option> 
                    <option value="A2">China</option> 
                    <option value="A3">Thailand</option> 
                    <option value="A4">Vietnam</option>
                    </optgroup>
            </select>
        </div>
        <div id="noCountry">Choose your country</div>
        <button type="submit" name="signUP" id="createBtn">join</button>
        <button type="reset" class="Btn">Reset</button>
    </fieldset>
</form>
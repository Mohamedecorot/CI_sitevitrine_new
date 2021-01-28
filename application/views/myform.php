
<?php echo form_open('form'); ?>

<h5>Username</h5>
<input type="text" name="username" value="" size="50" />
<?php echo form_error('username', '<div class="error">', '</div>'); ?>

<h5>Password</h5>
<input type="text" name="password" value="" size="50" />
<?php echo form_error('password', '<div class="error">', '</div>'); ?>


<h5>Password Confirm</h5>
<input type="text" name="passconf" value="" size="50" />
<?php echo form_error('passconf', '<div class="error">', '</div>'); ?>


<h5>Email Address</h5>
<input type="text" name="email" value="" size="50" />
<?php echo form_error('email', '<div class="error">', '</div>'); ?>

<div><input type="submit" value="Submit" /></div>

</form>
<?php $this->load->view('auth/header')?>

<body class="nobg loginPage">

<!-- Main content wrapper -->
<div class="loginWrapper">
    <div class="loginLogo"><img src="<?php echo base_url(); ?>images/loginLogo.png" alt="" /></div>
    <div class="widget">
        <div class="title"><img src="<?php echo base_url(); ?>images/icons/dark/files.png" alt="" class="titleIcon" /><h6>Login panel</h6></div>
		<?php $login = array('id' => 'validate', 'class' => 'form');
		echo form_open('',$login);?>
            <fieldset>
                <div class="formRow">
                    <label for="login">Username:</label>
                    <div class="loginInput"><input type="text" name="username" class="validate[required]" id="login" /></div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <label for="pass">Password:</label>
                    <div class="loginInput"><input type="password" name="password" class="validate[required]" id="pass" /></div>
                    <div class="clear"></div>
                </div>
                
                <div class="loginControl">
                    <input type="submit" value="Log me in" class="dredB logMeIn" />
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>    

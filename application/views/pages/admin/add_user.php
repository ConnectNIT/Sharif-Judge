<?php
/**
 * Sharif Judge online judge
 * @file add_user.php
 * @author Mohammad Javad Naderi <mjnaderi@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->view('templates/top_bar'); ?>
<?php $this->view('templates/side_bar',array('selected'=>'users')); ?>

<script>
	$(document).ready(function(){
		$("#add_users_button").click(function(){
			$("#loading").css('display','inline');
			$.post(
				'<?php echo site_url('users/add') ?>',
				{
					send_mail: ($("#send_mail").is(":checked")?1:0),
					delay: $("#delay").val(),
					new_users:$("#new_users").val(),
					shj_csrf_token: shj.csrf_token
				},
				function(data) {
					$("#main_content").html(data);
				}
			);
		});
	});
</script>

<div id="main_container" class="scroll-wrapper">
<div class="scroll-content">

	<div id="page_title">
		<img src="<?php echo base_url('assets/images/icons/add_user.png') ?>"/>
		<span><?php echo $title ?></span>
		<span class="title_menu_item"><a href="http://docs.sharifjudge.ir/users#add_users" target="_blank"><i class="splashy-help"></i> Help</a></span>
	</div>

	<div id="main_content">
		<p>You can use this field to add multiple users at the same time.</p>
		<ul>
			<li>Usernames may contain lowercase letters or numbers and must be between 3 and 20 characters in length.</li>
			<li>Passwords must be between 6 and 30 characters in length.</li>
			<li>If you want to send passwords by email, do not add too many users at one time. This may result in mail delivery fail.</li>
		</ul>
		<p class="input_p">
			<input type="checkbox" name="send_mail" id="send_mail" /> Send usernames and passwords by email (Waits <input type="text" name="delay" id="delay" class="sharif_input tiny" value="2"/> second(s) before sending each email, so please be patient).
		</p>
		<p class="input_p">
			<textarea name="new_users" id="new_users" rows="20" cols="80" class="sharif_input">
# Lines starting with a # sign are comments.
# Each line (except comments) represents a user.
# The syntax of each line is:
#
# USERNAME EMAIL PASSWORD ROLE
#
# Roles: admin head_instructor instructor student
# You can use RANDOM[n] for password to generate random n-digit password.</textarea>
		</p>
		<input type="submit" class="sharif_input" id="add_users_button" value="Add Users"/>
		<span id="loading" style="display: none;"><img src="<?php echo base_url('assets/images/loading.gif') ?>" /> Adding users... Please wait</span>

	</div> <!-- main_content -->
</div> <!-- scroll-content -->
</div> <!-- main_container -->
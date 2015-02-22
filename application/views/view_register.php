<div class="row text-center" style="margin: 20px;">
	Register
	<form class="form-horizontal">												
		<span id="spanRegisterError"></span>
		<div class="form-group">
			<label for="txtUserName">UserName: </label>
			<input type="text" id="txtUserName" name="txtUserName" class="form-control input-sm" style="margin-bottom: 4px;">
		</div>
		<label for="txtPassword">Password: </label>
		<input type="password" id="txtPassword" name="txtPassword" class="form-control input-sm">
		<label for="txtPasswordConf">Re-type Password:</label>
		<input type="password" id="txtPasswordConf" name="txtPasswordConf" class="form-control input-sm">
		<label for="txtEmail">Email:</label>
		<input type="text" id="txtEmail" name="txtEmail" class="form-control input-sm">
		<br/>
		<button id="btnRegister" name="btnRegister" type="button" class="btn btn-primary">Register</button>
	</form>
</div>	

<script src="<?php echo JQUERY_URL; ?>" ></script>
<script src="<?php echo BOOTSTRAPJS_URL; ?>" ></script>	
<script type="text/javascript">
	$(document).ready(function(){
		$(document).ready(function(){				
			$('#btnRegister').click(function(){ 
				var sUserName = $('#txtUserName').val();
				var sPassword = $('#txtPassword').val();
				var sPassword2 = $('#txtPasswordConf').val();
				var sEmail = $('#txtEmail').val();
			
				$.ajax({
					data: {'uname': sUserName, 'pword': sPassword, 'pword2': sPassword2, 
						'email': sEmail},
					url: 'register/doRegister',
					type: 'POST',
					success: function(data){					
						var result = $.parseJSON(data); 
						if(result['message'] != null){					
							$('#spanRegisterError').html(result['message']);
						} else if(result['result'])
							location.href = result['result'];
					},
					error: function(){
						alert('error');
					}
				});
				
			});
		});
	});
</script>
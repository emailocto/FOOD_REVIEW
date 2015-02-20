
<div id="divbody" class="row my_div_body">
	body here
</div>

<?php 
	//show login div here
?>

</div>

<div id="login_form" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
	<div class="modal-dialog" style="width: 400px;">
		<div class="modal-content" >
			<div class="modal-header">
				<button type="button" class="close" aria-label="Close"><span aria-hidden="true" data-dismiss="modal">&times;</span></button>
					<span id="login_header">Login Block</span>
			</div>
			<div class="modal-body">					
				<div class="row text-center" style="margin: 20px;">			
					<form>												
					<span id="spanLoginError"></span>
					<input type="text" id="txtUserName" name="txtUserName" class="form-control input-sm" style="margin-bottom: 4px;" placeholder="Username">
					<input type="password" id="txtPassword" name="txtPassword" class="form-control input-sm" placeholder="Password">
					<label class="checkbox">
						<input type="checkbox" name="remember"> Remember me
					</label>							
					<br/>
					<button id="btnLogin" name="btnLogin" type="button" class="btn btn-primary">Log in</button>							
					</form>
				</div>					
			</div>
		</div>
	</div>
</div>

<script src="assets/js/jquery-2.1.1.js" ></script>
<script src="assets/bootstrap-3.3.2/js/bootstrap.js" ></script>	
<script>
	$(document).ready(function(){
		$('#btnLog').click(function(){
			//reset forms
			$('#spanLoginError').html('');
			$('#txtUserName').val('');
			$('#txtPassword').val('');
		});
	
		$('#btnLogin').click(function(){ 
			var sUserName = $('#txtUserName').val();
			var sPassword = $('#txtPassword').val();
		
			$.ajax({
				data: {'uname': sUserName, 'pword': sPassword},
				url: 'login',
				type: 'POST',
				success: function(result){
					alert(result);
					$('#spanLoginError').html(result);
				},
				error: function(){
					alert('error');
				}
			});
			
		});
	});
</script>

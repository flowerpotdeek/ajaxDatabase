<!DOCTYPE html>
<html>
	<head>
		<script>var number = 0; </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
		<script src="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.css">

		<script> 
			function submitAjax() {
				var data = $('#signupForm').serialize();
				console.log(data);

   				//calling backend php code through Ajax

   				$.ajax({
   					url: "form.php",
   					method: "POST",
   					data: {"data" : data},
   					success: function(response){
   						$("#ajaxDiv").html("form submitted successfully");
   					}
   				}); //end of ajax call
			};

			function submitFetch() {
				var firstname = $('#searchfirstname').val();
				var lastname = $('#searchlastname').val();
				if (lastname == "")
				{
				$("#ajaxDiv").html("Searching database for &quot" + firstname + "&quot");

				$.ajax({
   					url: "search.php",
   					method: "POST",
   					data: {"search" : firstname},
   					success: function(response){
   						$("#ajaxDiv").html(response);
   					}
   				}); //end of ajax call
				}
				else
				{
				$("#ajaxDiv").html("Searching database for &quot" + lastname + "&quot");

				$.ajax({
   					url: "search.php",
   					method: "POST",
   					data: {"search" : lastname},
   					success: function(response){
   						$("#ajaxDiv").html(response);
   					}
   				}); //end of ajax call
				}
				


				$('#firstname').val("");
				$('#lastname').val("");
				$('#email').val("");
				$('#password').val("");
				$('#maleradio').prop('checked', false);
				$('#femaleradio').prop('checked', false);
				$('#transradio').prop('checked', false);
				$('#otherradio').prop('checked', false);
				$('#charactername').val("");
				$('#mainclass').val("");
					};

			function clearFields(element){
				console.log(element.id);
				if (element.id == "searchfirstname")
					$("#firstname").val("");
				else(element.id == "searchlastname")
					$("#lastname").val("");
				$('#firstname').val("");
				$('#lastname').val("");
				$('#email').val("");
				$('#password').val("");
				$('#maleradio').prop('checked', false);
				$('#femaleradio').prop('checked', false);
				$('#transradio').prop('checked', false);
				$('#otherradio').prop('checked', false);
				$('#charactername').val("");
				$('#mainclass').val("");
			}


		</script>
	</head>
	<body>
		<div class="column small-centered small-4">
			<h1><center>Sign up Form</center></h1>
			<form class="column small-centered small-12 column" id="signupForm" action="#" method="post" onsubmit="return false;">

<!-- First Name -->
			<div class="row">
				<div class="small-12 column">
				<label> Enter first name: 
					<input type="text" class="expanded" id="firstname" name="firstname" placeholder="First Name">
				</label>
				</div>
			</div>				

<!-- Last Name -->
			<div class="row">
				<div class="small-12 column">
				<label> Enter surname: 
					<input type="text" class="expanded" id="lastname"  name="lastname" placeholder="Last Name">
				</label>
				</div>
			</div>		

<!-- Email -->
<div class="row">
				<div class="small-12 column">
				<label> Enter email address: 
					<input type="text" class="expanded" id="email"  name="email" placeholder="email@website.ext">
				</label>
				</div>
			</div>				

<!-- Password -->
			<div class="row">
				<div class="small-12 column">
				<label> Enter password: 
					<input type="text" class="expanded" id="password" name="password" placeholder="password123">
				</label>
				</div>
			</div>		

<!-- Gender -->
			<div class="row">
				<div class="small-12 column">
				<label> What gender do you identify: <br>
					<input type="radio" name="gender" value="male" id="maleradio"><label for "maleradio">Male</label><br>
					<input type="radio" name="gender" value="female" id="femaleradio"><label for "femaleradio">Female</label><br>
					<input type="radio" name="gender" value="trans" id="transradio"><label for "transradio">Trans</label><br>
					<input type="radio" name="gender" value="other" id="otherradio"><label for "otherradio">Other</label><br>
				</label>
				</div>
			</div>		

<!-- Character Name -->
<div class="row">
				<div class="small-12 column">
				<label> What is your in-game character name: 
					<input type="text" class="expanded" id="charactername"  name="charactername" placeholder="Character Name">
				</label>
				</div>
			</div>		

<!-- Main Class -->
<div class="row">
				<div class="small-12 column">
				<label> What is your main Job/Class: 
					<input type="text" class="expanded" id="mainclass" name="mainclass" placeholder="Main Class/Job">
				</label>
				</div>
			</div>		




			<input class="button hollow small-12 column" id="testAjax" value="Register" type="button" onclick="submitAjax();">

			<div class="row">
				<div class="small-8 column">
					<label>Search by first name
					<input type="text" name="search" id="searchfirstname" placeholder="Search by First Name" onclick="clearFields(this);">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-8 column">
					<label>Search by last name
					<input type="text" name="search" id="searchlastname" placeholder="Search by Last Name" onclick="clearFields(this);">
					</label>
				</div>
			</div>

			<input class="button alert hollow small-12 column" id="testFetch" value="Fetch" type="button" onclick="submitFetch();">
			</form>
<!-- 		<input id="testAjax" value="testAjax" type="button" onclick="submitAjax()"> -->

			<p id="ajaxDiv"></p>
			
			
			<?php  		 ?>

		</div>
	</body>
</html>
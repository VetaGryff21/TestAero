<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AERO test task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
	  
      .form-signin {
        max-width: 450px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
	  
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
	  
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="bootstrap-responsive.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="/academy.php" method="POST">
        <h2 class="form-signin-heading">Welcome to AERO academy!</h2>
		<input name="username" type="text" class="input-block-level" placeholder="Name" required>
		<input name="phone" type="text" class="input-block-level" placeholder="Phone (11 digits)"  maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        <input name="email" type="email" class="input-block-level" placeholder="Email address" required>
		<input name="birthday" type="text" class="input-block-level" placeholder="Birthday (dd.mm.yyyy)" required><br>
		<textarea name="comment"  class="input-block-level" maxlength="110" placeholder="Comments" rows="2"></textarea>
		<div><button class="btn btn-large btn-primary" type="submit">Send</button></div>
      </form>

    </div>
	
  </body>
</html>

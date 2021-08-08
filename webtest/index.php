<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<script src="java.js"></script>
<style>
</style>
</head>
<body>

<div class="base">
  <div class="top_bar">
    <i class="icon"></i>
    <p class="icontxt">Palm beach</p>
    <h1 class="heading">Lorem Ipsum</h1>
    <p class="li subheading">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet
      congue nisi ac pharetra. Quisque eget convallis metus, aliquam semper
      ligula.</p>

    <a href=# class="li ho link1">About</a>
    <a href=# class="li ho link2">How it works</a>
    <a href=# class="li ho link3">Contact</a>

          <form action="add.php" method="post">
            <div class="field">
              <div>
              </div>
              <input onkeyup="check()" id="email" type="text" name="name" autocomplete="off" placeholder="Input e-mail">
                 <div class="icons">
                  <span class="icon1 fas fa-exclamation"></span>
                  <span class="icon2 fas fa-check"></span>
               </div>
            </div>
            <div class="error-text">
               Invalid email is added
          </div>
          <div class="error-text-2">
               Email address is required
            </div>
            <div class="error-text-3">
              We are not accepting subscriptions from Colombia emails
            </div>
<!---Checkbox-->
<div class="checkbox" style="display:none">
        <input type="checkbox" class="li checkbox" id="TOS" onclick="checkBoxClicked()">
        <label for="checkbox"><p class="text"> I agree to </p><a class="li ho link4" href="#">terms of service</a></input>
        </label>
      </div>
<!---Button-->
            <button onclick="ThankFunction()" input type="submit" name="submit" value="submit">Submit</button>
<!---Thanks-->
            <div id="ThankDiv" class="ThankDiv" style="display:none">
              <p>Thanks for subscribing!</p>
              <br>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet congue nisi ac pharetra.</p>
            </div>
         </form>
      </div>

      <script>
         const email = document.querySelector("#email");
         const icon1 = document.querySelector(".icon1");
         const icon2 = document.querySelector(".icon2");
         const error = document.querySelector(".error-text");
         const error2 = document.querySelector(".error-text-2");
         const error3 = document.querySelector(".error-text-3");
		     const chkbox = document.querySelector(".checkbox");
         const btn = document.querySelector("button");
		     const a1 = document.getElementById("TOS");
         let regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
         let regExp2 = /co$/;


         function check(){
           if(email.value.match(regExp)&& !(email.value.match(regExp2))){
             email.style.borderColor = "#27ae60";
             email.style.background = "#eafaf1";
             icon1.style.display = "none";
             icon2.style.display = "block";
             error.style.display = "none";
			       error2.style.display = "none";
			       error3.style.display = "none";
			       chkbox.style.display =  "block";
             //btn.style.display = "block";
           }
           else
           {
             email.style.borderColor = "#e74c3c";
             email.style.background = "#fceae9";
             icon1.style.display = "block";
             icon2.style.display = "none";
             error.style.display = "block";
             error2.style.display = "none";
             error3.style.display = "none";
			       chkbox.style.display =  "none";
             btn.style.display = "none";
           }
           if(email.value == 0){
             email.style.borderColor = "lightgrey";
             email.style.background = "#fff";
             icon1.style.display = "block";
             icon2.style.display = "none";
             error.style.display = "none";
             error2.style.display = "block";
             error3.style.display = "none";
			       chkbox.style.display =  "none";
             btn.style.display = "none";
           }

           if(email.value.match(regExp2)){
           email.style.borderColor = "lightgrey";
           email.style.background = "#fff";
           icon1.style.display = "block";
           icon2.style.display = "none";
           error.style.display = "none";
           error2.style.display = "none";
           error3.style.display = "block";
		       chkbox.style.display =  "none";
           btn.style.display = "none";
         }
		}

		 function checkBoxClicked()
		 {
			if(a1.checked == true)
				btn.style.display = "block";
			else
				btn.style.display = "none";
		 }
      </script>

      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-instagram"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-youtube-play"></a>
          </div>
        </div>
      <div class="image"></div>

<hr class="line">

      </body>
      </html>

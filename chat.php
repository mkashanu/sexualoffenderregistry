<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/style7.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <input type="checkbox" id="click">
      <label for="click">
      <i class="fab fa-facebook-messenger"></i>
      <i class="fas fa-times"></i>
      </label>
      <div class="wrapper">
         <div class="head-text">
           Report
         </div>
         <div class="chat-box">
            <div class="desc-text">
				Were you sexually assaulted?
               Please fill out the form below to report an incident of sexual violence.
            </div>
            <form action="includes/reportsave.php" method="post">
               <div class="field">
                  <input  name="name" type="text" placeholder="Your Name" required>
               </div>
               <div class="field">
                  <input name="address"type="text" placeholder="Address" required>
               </div>
			   <div class="field">
                  <input name="phone" type="text" placeholder="Phone number" required>
               </div>
               <div class="field">
                  <button type="submit" name="report">Report</button>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>
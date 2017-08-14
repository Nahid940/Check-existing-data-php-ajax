<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <h3>Existing data check..</h3>
    
    <form method="POST" onsubmit="return checkall();" class="form-inline form-horizontal">
          <div class="form-group">
            <label for="name" class="col-sm-2">Name:</label>
            <div class="col-md-6">
                 <input type="text" name="username" id="UserName" onkeyup="checkname();" class="form-control"><span id="name_status"></span>
             
            </div>
          </div>
         
         <div class="form-group" align="right">
             <div class="col-md-6">
                 <button name="button" id="button" class="btn btn-success">Submit</button>
            </div>
        </div>
       
    </form>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    function checkname()
    {
 var name=document.getElementById( "UserName" ).value;
	
     if(name)
     {
          $.ajax({
              type: 'post',
              url: 'checkdata.php',
              data: {
               user_name:name,
              },
              success: function (response) {
                   $( '#name_status' ).html(response);
                   if(response=="Available")	
                   {
                    $("#UserName").css("border-color","green");
                    $("#name_status").css("color","green");
                    return true;	
                   }
                   else
                   {
                    $("#UserName").effect("shake");
                    $("#UserName").css("border-color","red");
                    $("#name_status").css("color","red");
                    return false;	
                   }
              }
          });
     }
         else
         {
          $( '#name_status' ).html("");
          return false;
         }
}
    
    
    function checkall()
{
     var namehtml=document.getElementById("name_status").innerHTML;
     var emailhtml=document.getElementById("email_status").innerHTML;

     if((namehtml && emailhtml)=="OK")
     {
      return true;
     }
     else
     {
      return false;
     }
}
</script>

</body>

</html>
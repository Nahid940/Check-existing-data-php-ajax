<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>


<body>
   <center> <h3>Existing data check..</h3></center>
   
<div class="container">
  <hr/>
  <div class="warning">
    <center>
      <span id="result" class="label label-danger"></span>
    </center>	
  </div>

  <form class="form-horizontal" action="" id="inserName" onsubmit="return checkall();">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      
      <div class="col-sm-6">
        <input type="text" name="username" id="UserName" onkeyup="checkname();" class="form-control"/>
      </div>
      <span id="name_status" class="col-sm-2"></span>
    </div>
   

    <div class="form-group" align="right">        
      <div class="col-sm-offset-2 col-sm-6">
        <button  id="button" class="btn btn-success">Insert</button>
      </div>
    </div>
  </form>
  
</div>
    
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

    
//    function CheckInput(){
//        var UserName=document.getElementById( "UserName" ).value;
//        if(UserName==''){
//            $('#result').html("Enter Name");
//        }
//    }
 
    
    
    function checkname()
    {
        var name=document.getElementById( "UserName" ).value;
	
     if(name !='')
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

                            $("#UserName").css("border-color","red");
                            $("#name_status").css("color","red");
                            $("#UserName").effect("shake");
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
    
    
       $(document).ready(function(){
        $("#button").click(function(){
            var name = $('#UserName').val();
            if(name==''){
                $("#result").html("Insert Name!");
            }
        });
    });
 
</script>

</body>

</html>
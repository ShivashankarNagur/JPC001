<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>



@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap');

body{
    font-family: 'Noto Sans TC', sans-serif;
    padding: 0;
    margin: 0;
    color: rgba(0, 0, 0, 0.699);
    //background-color: rgb(255, 255, 255);
    background-color: #eceffc;
    box-sizing: border-box;
  
}
.container{
  display: flex;
  color:black;
  background-color:rgb(255, 255, 255);
  box-shadow: 1px 1px 5px 5px #00000044;
  width:400px;
  height:380px;
  flex-direction: column;
  margin:0 auto;
  margin-top:10%;
  align-items:center;
  border-radius: 10px;
  transitions: 0.5s;
}
.inputs{
  padding:10px;
  border-radius:4px;
  background: none;
  border: 2px solid rgb(211, 211, 211);
  width:50%;
  height:20px;
  transition:0.5s;
  color: rgba(0, 0, 0, 0.678);
}

.select{
	
  
  border-radius:4px;
  
  border: 2px solid rgb(211, 211, 211);
  width:55%;
  height:30px;
 

}
a{
  text-decoration: none;
  color: black;
}
.forget-span{
  margin-right:100px;
  font-size:12px;
}
.login-ahref{
  display:inline-block;
  padding:10px;
  background-color: white;
  box-shadow: 1px 1px 5px 5px #00000044;
  border-radius:5px;
  box-shadow: 1px 1px 5px 5px #00000044;
  padding-left:90px;
  padding-right:90px;
  margin-bottom:10px;

  transition: 0.5s;
}

.login-ahref:hover{
  letter-spacing:2px;
  padding-left:110px;
  padding-right:110px;
}
.inputs:hover{
  box-shadow: 1px 1px 5px 5px #00000044;
  color:black;
  width:60%;
  
}
.forget:hover{
  text-decoration: underline;
}
.inputs:focus{
  color: Black;
}
</style>
</head>

 <body>
    <div class="container">
    <h3>
        Admin Login
    </h3>
    <p id="errors"></p>
		<input type="text" placeholder=" Signum" name="uname" id="srUserName" class="email-input inputs">
        <br><input type="password" name="psw" placeholder="Password" id="srPswd"   class="password-input inputs">
        <br><span class="listName login-span login" data-screen="adminHomePage"><a href="#"  class="login-span login-ahref">Login</a></span>

    </div>
</body>

<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){
 

})

$(document).on('click touchstart','.listName',function(){

  var screen = $(this).data('screen');
  var srUserName = $("#srUserName").val();
  var srPswd = $("#srPswd").val();
  var loginType = $("#loginType").val();
  $.ajax({
      type:'post',
      url:'loginForAdmin',
     
       data:{
          srUserName:srUserName,
          srPswd:srPswd
      },
      success:function(data){
		  //alert(data)
          if(data){
              window.location.href="./"+screen;
          }else{
            $("#errors").children().remove();
            $('#errors').append('<p style="color:red;text-align:center">please login with valid credentials</p>');
              //alert("please login with valid credentials")
          }
      }
  })
})


</script>

</body>
</html>

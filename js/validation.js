

function validate(){
   
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    document.getElementById("error").style = "display:none";

        var request = new XMLHttpRequest();
        request.onload = function (){
        if(request.status == 200){
            
                if(request.response == ""){
                    location.href = 'index.php';
                }
                document.getElementById("error").innerText = request.response;
                document.getElementById("error").style = "display:block";  
                return false; 
                          
        }
        
     };
    
     request.open("POST","validation.php",true);
     request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     request.send("username="+username+"&password="+password);
     
return false;
 
}

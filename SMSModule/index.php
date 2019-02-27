<?php
  //##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode){
$url = 'https://www.itexmo.com/php_api/api.php';
$itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
$param = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($itexmo),
    ),
);
$context  = stream_context_create($param);
return file_get_contents($url, false, $context);}
//##########################################################################
              
    if ($_POST){
        $number=$_POST ['number'];
$name= $_POST ['name'];
$msg=$_POST ['msg'];
$api="TR-ABEGA316590_3WAAN";
$text=$name."                                         ".$msg;


  if(!empty ($_POST['name']) && ($_POST['number']) && ($_POST ['msg'])){
  $result = itexmo($number,$text,$api);
    if ($result == ""){
    echo "iTexMo: No response from server!!!
    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
    Please CONTACT US for help. ";  
    }else if ($result == 0){
    echo "Message Sent!";
    }
    else{ 
    echo "Error Num ". $result . " was encountered!";
}


    }
}                  

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>SMS Module</title>
  </head>
  <body>
    <div class= "container">
      <div class = "row">
        <div class = "col-md-4 col-sm-6 col-xs-12">
          <form method= "POST" action= "index.php">
            <div class= "form-group">
              <label for= "name"> Your Name </label>
              <input type= "text" maxlength = "30" class = "form-control" id ="name" 
                  placeholder= "Name" name= "name" required>
            </div>

               <div class= "form-group">
              <label for= "number"> Receipient's Mobile Number </label>
              <input type= "text" maxlength = "11" class = "form-control" id ="number" 
                  placeholder= "Mobile Number" name= "number" required>                  
            </div>

                <div class= "form-group">
                  <label for= "msg"> Your Message </label>
                    <textarea class = "form-control" rows ="3" name= "msg" placeholder= "Message here" onkeyup="countChar(this)" required>
                    </textarea>
                </div>

                  <p class = "text-right" id = "charNum"> 85 </p>

                    <button type= "submit" class ="btn btn-success"> Send </button>
          </form>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function countChar(val){
          var len = val.value.length;
            if(len >= 85){
              val.value = val.value.substring(0,85);
            } 
                else{
                  $('#charNum').text(85-len);
            };
        }
     </script
  </body>
</html>
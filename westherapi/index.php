

  <?php
     
    $weather = "";
    $error = "";
     
  if ($_GET) {
         

     $urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".($_GET['city']).",lat=44.34&lon=10.99&appid=4b5d2c11f61e2834dd39f9ed47abf354");

        $weatherArray = json_decode($urlContents, true);
         
        if ($weatherArray['cod'] == 200) {
         
            $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";
 
            $tempInCelcius = intval($weatherArray['main']['temp'] - 273);
 
            $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
           
              $weather .= "The main  is  '".$weatherArray['weather'][0]["main"]."'. ";
 
    $weather .= "The Humidity  is  '".$weatherArray['main']["humidity"]."'. ";
$weather .= "The Base  is  '".$weatherArray['base']."'. ";

    $weather.="The sunrise is '" .$weatherArray['sys']['sunrise']."'.";
    $weather.="The sunset is '" .$weatherArray['sys']['sunset']."'."; 
      } else {
             
            $error = "Could not find city - please try again.";
             
        }
         }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
 
  <title>Weather App</title>
</head>
<style>
  html { 
          background: url(rainbow.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          }
         
         
  body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 1rem;
    line-height: 1.5;
    background-color: rgba(0,0,0,.0001);;
    
}
label {
    display: inline-block;
    margin-bottom: 0.5rem;
}
    h1 {
    margin-bottom: 0.5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;  
    }    
    .form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #55595c;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 10px;
}
.btn-primary {
    color: #fff;
    background-color: #0275d8;
    border-color: #0275d8;
}
.alert-success {
    color: #fff;
    background-color: #5bc0de8a;
    border-color: #d0e9c6;
}
.alert {
    padding: 15px;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 10px;
} 
.btn {
    display: inline-block;
    padding: 0.375rem 1rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    
    user-select: none;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}
  .box{
      margin-top: 100px;
  }         
          .container {
               
              text-align: center;
            
              width: 450px;
               
          }
           
          input {
               
              margin: 20px 0;
               
          }
           
          #weather {
               
              margin-top:15px;
               
          }

  </style>
<body>
    <div class="container">
       <div class="box">
          <h1>Search Global Weather</h1>
           
           
           
          <form>
  <fieldset class="form-group">
    <label for="city">Enter the name of a city.</label>
    <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value = "">
  </fieldset>
   
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
       
          <div id="weather"><?php
               
              if ($weather) {
                   
                  echo '<div class="alert alert-success" role="alert">
  '.$weather.'
</div>';
                   
              } else if ($error) {
                   
                  echo '<div class="alert alert-danger" role="alert">
  '.$error.'
</div>';
                   
              }
               
              ?></div>
      </div>
 
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>



</div>
</body>
</html>
</p>
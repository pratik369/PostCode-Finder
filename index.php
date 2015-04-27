
<!doctype html>
<html>
<head>
    <title>Weather Forecast</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    
    <style>
        html,body {
         
            height:100%;
            
        }
            
        .container {
                
            background-image:url("download1.jpg");
            width:100%;
            height:100%;
            background-size:cover;
            background-position:center;
            
        
        }
        
        .center{
        text-align:center;
        }
        
        .white {
         color:white;   
        }
        
        button {
        
        margin-bottom:20px;
        }
        
        .alert {
         
            margin-top:20px;
            display:none;
            
            
        }
        
    
    </style>
    
    
</head>

<body>

   
   <div class="container">
    
    
        <div class="row">
        
            <div class="col-md-6 col-md-offset-3 center">
            
            <h1 class="center"> Postcode Finder</h1>
            
            <p class="lead center"> Enter any address to find the Postcode.</p>
            
            
                
                <div class="form-group">
                    
                     <input type="text" class="form-control" name="city" id="address" placeholder=" Eg. Wall Street, New York..."/>
                     
                     
                     
                </div>
                
                <button id="findmypost" class="btn btn-success bth-lg">Find my Postcode</button>


               
            
            
            <div id="success" class="alert alert-success">Success!</div>
            <div id="fail" class="alert alert-danger">Failed! Could not find postcode for that location. Please try again.</div>
            <div id="fail2" class="alert alert-danger">Failed! Could not connect to Server.</div>

            <div id="entercity" class="alert alert-danger">Please Enter The City.</div>
            
            </div>
        
         
        
        </div>
    
    
    </div>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script>
    
    
    $("#findmypost").click(function(){
        
        
        var result=0;
        $(".alert").hide();

        $.ajax({
            type: "GET",
            url: "https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($('#address').val())+"&key=AIzaSyBBKp-qLoz1isA5BCdl9WrBLI-M2HEnU8U&sensor=true",
            dataType: "xml",
            success: processXML,
            error: error

        
        });
        

        function error() {

            $("#fail2").fadeIn();

        }
        function processXML(xml){
            
        
        $(xml).find("address_component").each(function() {
         
            if ( $(this).find("type").text() == "postal_code") {

            
            $("#success").html(" The post code is "+$(this).find('long_name').text()).fadeIn();
            
            result=1;
            
            }
            
        });

        if (result==0) {

            $("#fail").fadeIn();

        };

        }
        
    
    });
                              

    
</script>
    
     
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    
    <title>Weather Scraper</title>
</head>

<style>
    html {
    background: url(weatherScraperBG.jpg) no-repeat center fixed;
    background-size: cover;
    color: white;
        font-family: Arial, Helvetica, sans-serif;
    }

    body { 
        background: transparent; 
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
        font-weight: 300;
    }

    h1 {
        
    }

    #weatherHeader {
        padding-top: 25%;
    }

    #weatherInfoBox {
        padding-top: 3%;
    }

    #city {
        opacity: 70%;
        /* background-color: black !important; */
        color: rgb(57, 57, 57);
        font-weight: 400;
        margin-top: 2%;
        border: none;
    }

    #city:focus {
    outline: 0;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    box-shadow: none !important;
}

    .btn-primary {
        margin-top: 1%;
        background-color: rgb(34, 127, 226);
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus, 
    input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 30px white inset !important;
        background-color: black !important;
    }

    #resultsContainer {
        background-color: rgba(0,0,0,0.6);
        /* opacity: 60%; */
        border-radius: 15px;
        margin-top: 2%;
        color: white;
        padding: 15px;
        display: none;
        /* visibility: hidden; */
        /* width: 40%; */
    }
</style>

<body>
    
    <div class="container">
        <div class="row justify-content-around text-center" id="weatherHeader">
            <div class="col-md-9">
                <h1>Weather Forecast</h1>
            </div>
        </div>

        <div class="row justify-content-around text-justify">
            <p>Enter your city below to find your current weather.</p>
        </div>

        <form>
            <div class="row form-group">
                <input type="text" class="col form-control text-center" placeholder="" name="city" id="city" autofocus>
            </div>
            <div class="row justify-content-around">
            <button class="btn btn-primary btn-lg" id="findMyWeather">Find My Weather</button>
            </div>
        </form>
        
        <div class="row justify-content-around text-center">
            <div class="col-md-7" id="resultsContainer">
                
            </div>
    
        </div>
        
    </div>

    


<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    $("#findMyWeather").click(function(event) {
        
        event.preventDefault();

        if($("#city").val()!="") {
            
            $.get("scraper.php?city="+$("#city").val(), function(data){
                
                $("#resultsContainer").html(data).fadeIn();
            
                if (data.includes("HTTP request failed")) {
                    
                    $("#resultsContainer").html("City not found. Please enter a valid city name.").fadeIn();
                    $("#resultsContainer").css("background-color", "rgba(255, 66, 66, 0.6)");
                }

            }).fail(function() {
                alert("test fail")
});
        } else {
        
            $("#resultsContainer").html("Please enter a city.").fadeIn();
        }
    });

</script>    


</body>
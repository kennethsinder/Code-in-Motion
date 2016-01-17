@extends('layouts.master')

@section('content')
    <h1>Code in Motion</h1>
    <h4>Homepage of <strong><a href="about">Kenneth Sinder</a></strong>,
        Software Engineering student at the University of Waterloo</h4><hr/>

    <table style="text-align: left;">

    <tr>
        <td><h4><span style="font-weight: bold;">Latest Blog Post:&nbsp;</span></h4></td>
        <td><h4><a href="{{"blog/".$blog->id}}">{{$blog->title}}</a></h4></td>
    </tr>
    <tr>
        <td><h4><span style="font-weight: bold;">Latest Project:&nbsp;</span></h4></td>
        <td><h4><a href="{{"projects/".$project->id}}">{{$project->name}}</a></h4></td>
    </tr>
    <tr>
        <td><h4><span style="font-weight: bold;">Resume (PDF):&nbsp;</span></h4></td>
        <td><h4><a href="resume.pdf" target="_blank">My Resume</a></h4></td>
    </tr>
    <tr>
        <td><div style="text-align: left;"><img src="images/linkedin.png"/></div></td>
        <td><h4><a href="https://ca.linkedin.com/in/kenneth-sinder-aa5040102">LinkedIn Profile</a></h4></td>
    </tr>

    <tr>
        <td><div style="text-align: left;"><img src="images/github.png"/></div></td>
        <td><h4><a href="https://github.com/kennethsinder">GitHub Profile</a></h4></td>
    </tr>

    <tr>
        <td><div style="text-align: left;"><img src="images/email.png"/></div></td>
        <td><h4><a href="/contact">Contact Me via Email</a></h4></td>
    </tr>

    </table>

    <h4><span id="temp"></span><a href="#" id="wrongloc" title="Wrong Location?"></a></h4>

    <script type="text/javascript">
        $(document).ready(function() {
            var geo = {};
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success, error);
            }
            else {
            }
            function error() {
            }

            function success(position) {
                geo.lat = position.coords.latitude;
                geo.lng = position.coords.longitude;
                var weather = "http://api.openweathermap.org/data/2.5/weather?lat=" + geo.lat + "&lon=" + geo.lng + "&appid=050682ce75e55e9727deeeac96fca361";
                var city, temp, cond, ctry;
                var $wrongLoc = $('#wrongloc');
                $wrongLoc.html("Not Your Location?");
                $wrongLoc.hover(function() {
                   $wrongLoc.css({"text-decoration": "underline"})
                },
                function() {
                    $wrongLoc.css({"text-decoration": "none"})
                });
                var f = function (result) {
                    city = result.name;
                    temp = result.main.temp - 273.15;
                    cond = result.weather[0].description;
                    ctry = result.sys.country;
                    printWeather(city, cond, temp);
                };
                $.getJSON(weather, f);

                $wrongLoc.click(function() {
                    var newCity = prompt("Please enter your city:", city);
                    if (newCity != null)
                    {
                        weather = "http://api.openweathermap.org/data/2.5/weather?q=" + newCity + "," + ctry +
                                "&appid=050682ce75e55e9727deeeac96fca361";
                        $.getJSON(weather, f);
                    }
                });

            }

            function printWeather(city, cond, temp)
            {
                var msg = "(Data from OpenWeatherMap API)";
                $('#temp').html("<br><strong>Current Weather: </strong>The weather right now in " + city + " is " + cond +
                        " with a temp of " + temp.toFixed(1) + "\xB0C.<br><h5>" + msg + "</h5>");
            }
        });
    </script>
@endsection
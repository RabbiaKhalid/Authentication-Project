<!DOCTPE html>
<html>
<head>
  <title>Weather App</title>  
   
<style>
     *{
    margin: 0;
    padding: 0;
    background-color:#20B2AA;
}
a {
	color: white;
	opacity: 0.54;
	text-decoration: none;
}
h1,
h2,
h3,
h4 {
	color: white;
	font-family: 'Roboto';
	font-weight: 100;
	line-height: 1.1;
	letter-spacing: 0.025em;
	margin: 0; padding: 0;
}
a {
	color: white;
	opacity: 0.54;
	text-decoration: none;
}
a:hover,
.active {opacity: 1;}

.wrapper {
	width: 480px;
	margin: 0 auto;
}
.searchbar,
.button {
	height: 45px;
	margin: 1em 0 4em;
	padding: 0;
	font: 400 1rem 'Roboto';
	letter-spacing: 0.025em;
	text-transform: uppercase;
	color: white;
	border: none;
}
.searchbar {
	float: left;
	width: 380px;
	border-bottom: solid thin white;
	color: #E8E8E8;
	color: rgba(255, 255, 255, 0.7);
}
.button {
	float: right;
	width: 100px;
}
.panel {
	width: 100%;
	display: inline-block;
}
.weather {
	width: 100%;
	margin-top: 20px;
	display: inline-block;
}
.city {
	text-align: left;
	border-bottom: solid thin white;
	text-transform: uppercase;
	color: #E8E8E8;
	color: rgba(255, 255, 255, 0.7);
}
.group {
	width: 165px;
	margin-bottom: 20px;
	text-align: right;
	float: right;
	clear: both;
}
.temp {
	font-size: 4.5em;
	font-weight: 300;
	line-height: 0.75;
}
.celsius,
.fahrenheit,
.divider {
	font-size: 1.75rem;
	vertical-align: super;
}
.divider {
	margin: 0 0.05em;
}
.forecast {
	display: table;
	text-transform: uppercase;
	width: 100%;
}
.block {
	display: table-cell;
	padding: 1.5em 0 0 0;
	text-align: center;
}
.high {
	font-weight: 300;
	margin: 0.25em 0;
}
.alert{
    color: #FF0000;
    padding-left: 15%
}

.head{
    width: 100%;
    
    height: 40px;
    border-radius: 20px 20px 0 0;
}
.head p{
    line-height: 40px;
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    color: #fff;
}

.secondary {opacity: 0.7;}
.transparent {background: transparent;}
.hot {background: #FF5722;}
.warm {background: #FF6F00;}
.cool {background: #2196F3;}
.cold {background: #3F51B5;}
.color404 {background: #161616;}
.button-hot {background: #BF360C;}
.button-warm {background: #B34E00;}
.button-cool {background: #0D47A1;}
.button-cold {background: #1A237E;}
.button404 {background: black;}
.searchbar::-webkit-input-placeholder {color: white; opacity: 0.35;}
.searchbar::-moz-placeholder {color: white; opacity: 0.35;}
.searchbar:-ms-input-placeholder {color: white; opacity: 0.35;}
.searchbar:-moz-placeholder {color: white; opacity: 0.35;}

.button:focus,
.searchbar:focus {outline: none; color: white;}
.searchbar:focus::-webkit-input-placeholder {color: white; opacity: 0.7;}
.searchbar:focus::-moz-placeholder {color: white; opacity: 0.7;}
.searchbar:focus:-ms-input-placeholder {color: white; opacity: 0.7;}
.searchbar:focus:-moz-placeholder {color: white; opacity: 0.7;}
@import url('https://fonts.googleapis.com/css?family=Roboto:400,300,100');
@import url('https://cdnjs.cloudflare.com/ajax/libs/weather-icons/1.3.2/css/weather-icons.min.css');
</style>

   
</head>

<body>
<div class='wrapper'>

  <search>
    <form method="POST" action="forecast">
		@csrf
		<div class="head">
	<p> <input class='searchbar transparent' id='search' name="search" type='text' placeholder='enter city, country' class="@error('search') is-invalid @enderror" />
	  @error('search')
    <div class="alert">{{ $message }}</div>
       @enderror</p>
      <input class='button transparent' id='button' type="submit" value='GO' />
    </form>
</div>
  </search>

  <div class='panel'>
    <h2 class='city' id='city' >{{$currentweather['name']}}</h2>
    <div class='weather' id='weather'>
      <div class='group secondary'>
        <h3 id='dt'></h3>
        <h3 id='description'>{{ucfirst($currentweather['weather'][0]['description'])}}</h3>
      </div>
      <div class='group secondary'>
        <h3 id='wind'>Wind Speed: {{round($currentweather['wind']['speed'])}}</h3>
        <h3 id='humidity'>Humidity: {{round($currentweather['main']['humidity'])}}</h3>
      </div>
      <div class='temperature' id='temperature'>
		  <img src="http://openweathermap.org/img/wn/{{$currentweather['weather'][0]['icon']}}@2x.png" alt="icon">
        <h4 class='temp' id='temp'><i id='condition'></i> <span id='num'></span><a class='fahrenheit active' id='fahrenheit' href="#">{{round($currentweather['main']['temp']*(9/5)+32)}}&deg;F</a><span class='divider secondary'>|</span><a class='celsius' id='celsius' href="#">{{round($currentweather['main']['temp'])}}&deg;C</a></h4>
      </div>
      <div class='forecast' id='forecast'></div>
    </div>
  </div>
</body>
</html>
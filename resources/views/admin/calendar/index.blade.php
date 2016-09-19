<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
    <style>
      body {
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
      }

    <style>
        .fc-event {
    background-color: black; /* background color */
    border-color: black;     /* border color */
    color: red;              /* text color */
    }
    .fc-sun,.fc-sat {
	  background-color: red;
	  color: #FFFFFF;
	}
	.fc-content	{ height:30px;}
	.fc-title {line-height: 30px;}
    </style>
</head>
<body>
<div style="width:400px !important; height:300px;">
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
    {{ $users }}
   <!-- <?php //print_r($events); ?>  -->
</div>
</body>
</html>
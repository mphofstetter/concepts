<?php require_once("config.php"); ?>
<html>

<head>

	<script src="/jquery.js"></script>

	<script type="text/javascript">

	var ONE_FRAME_TIME = 1000 / 60 ;
	var ON = false;

	var ctx;


	function render(data){		
		ctx.clearRect ( 0 , 0 , 800 , 500 ); 
		var results = JSON.parse(data);
		var objects = results.objects;
		for(var i = 0; i<objects.length; i++){
			var object = objects[i];				
			renderObject(object);
		}

		var log = results.log;
		$('#log').prepend(log);
	}

	function renderObject(object){	
		switch(object.type){
			case 'circle':
			renderCircle(object);
			break;

			case 'polygon':
			renderPolygon(object);
			break;

			case 'text':
			renderText(object);
		}
	}

	function renderCircle(object){

		var fill = object.fill;
		var px = object.px;
		var py = object.py;
		var radius = object.radius;

		ctx.beginPath();
		ctx.arc(px, py, radius, 0, 2*Math.PI);
		ctx.fillStyle = fill;
		ctx.closePath();
		ctx.fill();
		ctx.stroke();		
	}

	function renderPolygon(object){
		
		var fill = object.fill;		
		ctx.beginPath();
		ctx.fillStyle = fill;
		ctx.moveTo(object.points[0][0], object.points[0][1]);
		for(var i = 1; i<object.points.length; i++){
			var point = object.points[i];
			ctx.lineTo(point[0], point[1]);
		}
		ctx.closePath();
		ctx.fill();
		ctx.stroke();
	}

	function renderText(object){

		var font = object.font;
		var color = object.color;
		var px = object.px;
		var py = object.py;
		var text = object.text;
		var align = object.align;

		ctx.font = font;
		ctx.fillStyle = color;
		ctx.textAlign = align;
		ctx.fillText(text, px, py);

	}

	var mainloop = function() {

		if(!ON){
			return;
		}

		$.post("/update.php",{sim: "<?php echo $_GET['sim']; ?>"}, function(data){			
			render(data);
		});		
	};

	$(document).ready(function(){
		ctx = document.getElementById('canvas').getContext('2d');

		$('#start').click(function(){
			ON = !ON;
			$(this).attr("value", ON ? "Stop" : "Start");
		});
		setInterval( mainloop, ONE_FRAME_TIME );
	});

	</script>

</head>

<body>
	<canvas id="canvas" style="border: 1px solid #000000; float: left;" width="<?php echo Config::$SCREEN_WIDTH; ?>" height="<?php echo Config::$SCREEN_HEIGHT; ?>" ></canvas>

	<div style="width: 200px; height: <?php echo Config::$SCREEN_HEIGHT; ?>; border: 1px solid #000000; float: left; position: relative; margin-left: 5px;">
		<input id="start" type="button" value="Start"/>
		<textarea id="log" style="width: 100%; height: 96%; font-size: 10px"></textarea>
	</div>

	<div style="clear: both;"></div>
	
</body>

</html>
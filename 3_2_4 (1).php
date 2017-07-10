<!doctype html>
 <html>
 <head>
 <meta charset="utf-8">
 <title>Projekt Iteration 3 Teilaufgabe 4</title>
 <style>
	body {background-color: lightblue;}
	
 </style>
 </head>
 <body>
 <script src="Chart.min.js"></script>
 <p>Hashtag-häufigkeit</p>
 <div class = "Container">
<div>
</canvas><canvas id="myChart"></canvas>
</div>
</div>
	<?php
		$dbconn = pg_pconnect("host=localhost port=5432 dbname=election user=postgres password=passwort");
		if (!$dbconn) {
		    echo "An error occurred while connecting.\n";
		    exit;
		}
		$result = pg_query($dbconn, "SELECT time  FROM usertweet");
		if (!$result) {
		    echo "An error occurred while retreiving data.\n";
		    exit;
		}
		$dates=array("dates");
		$times=array("int");
		$counter=0;
		$arr= pg_fetch_all($result) ;
		$new_arr= array_column($arr,'time');
		//for ($i=0;$i<count($arr);$i++){

		//	if((array_search($arr[$i],$dates))!=False){
		//		array_push($dates,$arr[$i]);
		//		array_push($times, 1);
		//		$counter += 1;
		//	}else{
		//		$times[$counter] += 1;
		//	}
		//}
		//print_r($times);
		//echo gettype($new_arr);
	?>
	<script>
		var array= <?php echo json_encode($new_arr); ?>;
		//var how_often = <?php echo json_encode($times); ?>;
		//document.write(array)
		
	</script>
	<script>
		var lab_data =[];
		var set_data =[];
		
		
		for(i=0;i<1256;i++){
			var temp=lab_data.indexOf(array[i]);
			if(temp<0){		
				lab_data.push(array[i]);
				set_data.push(1);
			}else{
				set_data[temp]+=1;	
			}
		}
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: lab_data,
				datasets: [{
					label: 'hashtag',
					data: set_data,
					backroundColor: "#1515DA"
					}]
				}
			});
				



 </script>	
 </body>
 </html>

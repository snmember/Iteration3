<!doctype html>
 <html>
 <head>
 <meta charset="utf-8">
 <title>Projekt Iteration 3 Teilaufgabe 5</title>
 <style>
	body {background-color: lightblue;}

/* Style The Dropdown Button */
	.dropbtn {
	    background-color: #4CAF50;
	    color: white;
	    padding: 16px;
	    font-size: 16px;
	    border: none;
	    cursor: pointer;
	}

	/* The container <div> - needed to position the dropdown content */
	.dropdown {
	    position: relative;
	    display: inline-block;
	    overflow:auto;
	}
	.dropdown:hover .dropbtn {
	    background-color: #3e8e41;
	}

</style>
<div class="dropdown">
  <div class="dropdown-content">
	<form>
	    <select id="hashtag_input">
		<option>Wähle ein Hastag</option>
		 <?php
			$db_conn = pg_pconnect("host=localhost port=5432 dbname=election user=postgres password=passwort");
			$result_1 = pg_query($db_conn, "SELECT hashtag FROM hashtag ");
			$arr_1= pg_fetch_all($result_1) ;
			$hashtag= array_column($arr_1,'hashtag');
			
			foreach($hashtag as $item){
		?>
		<option value="<?php echo $item; ?>"><?php echo $item; ?></option>
		<?php
		}
		?>
	    </select>
			    
	    <input type="button" value="Los gehts!" onclick="hashtag_check()">
	</form>
	
  </div>
</div> 
 </head>
 <body>
 <script src="Chart.min.js"></script>
 <div class = "Container" id= "chart">
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
		$result = pg_query($dbconn, "SELECT time, hashtag_in_tweet FROM usertweet ");
		if (!$result) {
		    echo "An error occurred while retreiving data.\n";
		    exit;
		}
		$dates=array("dates");
		$times=array("int");
		$counter=0;
		$arr= pg_fetch_all($result) ;
		$time_arr= array_column($arr,'time');
		$hashtag_arr= array_column($arr,'hashtag_in_tweet');		
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
		var time= <?php echo json_encode($time_arr); ?>;
		var hashtag = <?php echo json_encode($hashtag_arr); ?>;
		//var temp_array = hashtag[1254].split(", ");		
		//document.write(temp_array)
		
	</script>

	<script>

		function hashtag_check(){
			var temp_tag = document.getElementById("hashtag_input").value;
			var search_tag= temp_tag;
			
			
			//var test=['#ASD', '#ASC','#ADD'];
			//document.write(test.indexOf(search_tag));
			//document.write(test[0]+"\n")
			var lab_data =[];
			var set_data =[];
			//document.write(hashtag[0]+ "\n")
			for(i=0;i<1255;i++){
				var temp_array = hashtag[i].split(", ");
				if (temp_array== hashtag[i]){
					laenge= 1;
				}else{
					laenge = temp_array.length;
				}
				//document.write(laenge +"\n")
				if (temp_array.length>1){
					for(j=0;j<laenge;j++){
						var temp=temp_array[j].indexOf(search_tag);
						//document.write(temp+ "\n")
						if(temp>=0){
							//document.write(temp+ "\n")
							//document.write(temp_array[temp-1]+ "\n");
							if (lab_data.indexOf(time[i])<0){
								lab_data.push(time[i]);
								set_data.push(1);
							}else{
								set_data[lab_data.indexOf(time[i])]+=1;	
							}
						}
					}
				}else{
					//document.write(temp_array==search_tag);
					
					if(temp_array==search_tag && lab_data.indexOf(time[i])<0){
						document.write("else"+ "\n")
						lab_data.push(time[i]);
						set_data.push(1);
					}else if(temp_array==search_tag && lab_data.indexOf(search_tag)>=0){
						set_data[lab_data.indexOf(time[i])]+=1;	
					}
				}
			}
			//document.write(set_data + "\n")
			//var counter = 0
			//for(k=0;k<set_data.length;k++){			
			//	if (set_data[k-counter] ==0){
			//		set_data= set_data.splice(k-counter,1);
			//		lab_data= set_data.splice(k-counter,1);
			//		counter += 1
			//	}
			//}
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: lab_data,
					datasets: [{
						label: search_tag,
						data: set_data,
						backroundColor: "#1515DA"
						}]
					},
				options: {
					scales: {
					    yAxes: [{
						ticks: {
						    beginAtZero:true
						}
					    }]
					}
				    }

				});

			}
			
		
		



 </script>	
 </body>
 </html>

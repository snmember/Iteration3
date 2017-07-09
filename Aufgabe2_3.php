<!DOCTYPE html>
<html>
	 <head>
		 <meta charset="utf-8"></meta>
		 <title>Projekt Iteration 3 Teilaufgabe 3</title>
	 </head>
	 <style>
		body {background-color: lightblue;}
	
	 </style>	
	<p align="left"><font color='#00FFFF'>CLUSTER 1</font></p>
	<p align="left"><font color='#A52A2A'>CLUSTER 2</font></p>
	<p align="left"><font color='#7FFF00'>"CLUSTER 3 </font></p>
	<p align="left"><font color='#006400'>"CLUSTER 4</font></p>

	




	 <body>
		<script src="sigma.js-1.2.0/src/sigma.core.js"></script>
		<script src="sigma.js-1.2.0/src/conrad.js"></script>
		<script src="sigma.js-1.2.0/src/utils/sigma.utils.js"></script>
		<script src="sigma.js-1.2.0/src/utils/sigma.polyfills.js"></script>
		<script src="sigma.js-1.2.0/src/sigma.settings.js"></script>
		<script src="sigma.js-1.2.0/src/classes/sigma.classes.dispatcher.js"></script>
		<script src="sigma.js-1.2.0/src/classes/sigma.classes.configurable.js"></script>
		<script src="sigma.js-1.2.0/src/classes/sigma.classes.graph.js"></script>
		<script src="sigma.js-1.2.0/src/classes/sigma.classes.camera.js"></script>
		<script src="sigma.js-1.2.0/src/classes/sigma.classes.quad.js"></script>
		<script src="sigma.js-1.2.0/src/classes/sigma.classes.edgequad.js"></script>
		<script src="sigma.js-1.2.0/src/captors/sigma.captors.mouse.js"></script>
		<script src="sigma.js-1.2.0/src/captors/sigma.captors.touch.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/sigma.renderers.canvas.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/sigma.renderers.webgl.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/sigma.renderers.svg.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/sigma.renderers.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/webgl/sigma.webgl.nodes.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/webgl/sigma.webgl.nodes.fast.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/webgl/sigma.webgl.edges.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/webgl/sigma.webgl.edges.fast.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/webgl/sigma.webgl.edges.arrow.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.labels.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.hovers.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.nodes.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.edges.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.edges.curve.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.edges.arrow.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.edges.curvedArrow.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.edgehovers.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.edgehovers.curve.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.edgehovers.arrow.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.edgehovers.curvedArrow.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/canvas/sigma.canvas.extremities.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/svg/sigma.svg.utils.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/svg/sigma.svg.nodes.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/svg/sigma.svg.edges.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/svg/sigma.svg.edges.curve.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/svg/sigma.svg.labels.def.js"></script>
		<script src="sigma.js-1.2.0/src/renderers/svg/sigma.svg.hovers.def.js"></script>
		<script src="sigma.js-1.2.0/src/middlewares/sigma.middlewares.rescale.js"></script>
		<script src="sigma.js-1.2.0/src/middlewares/sigma.middlewares.copy.js"></script>
		<script src="sigma.js-1.2.0/src/misc/sigma.misc.animation.js"></script>
		<script src="sigma.js-1.2.0/src/misc/sigma.misc.bindEvents.js"></script>
		<script src="sigma.js-1.2.0/src/misc/sigma.misc.bindDOMEvents.js"></script>
		<script src="sigma.js-1.2.0/src/misc/sigma.misc.drawHovers.js"></script>	
		
		<?php


			$dbconn = pg_pconnect("host=localhost port=5432 dbname=election user=postgres password=passwort");
			if (!$dbconn) {
			    echo "An error occurred while connecting.\n";
			    exit;
			}


			$result = pg_query($dbconn, "SELECT *  FROM hashtag");
			if (!$result) {
			    echo "An error occurred while retreiving data.\n";
			    exit;
			}
			//$arr= pg_fetch_all($result) ;
			//$first_coll = array();
			//$second_coll = array();
			//$third_coll = array();
			//$forth_coll = array();
			//while($rows = pg_fetch_row($result)){
			//	array_push($first_coll,$result[0]);
			//	array_push($second_coll,$result[1]);
			//	array_push($third_coll,$result[2]);
			//	array_push($forth_coll,$result[3]);
			//}
			//print_r($first_coll);
			
			$arr= pg_fetch_all($result) ;
			$first = array_column($arr,'hashtag');
			$second = array_column($arr, 'tweet_indices');
			$third = array_column($arr,'hashtag_count');	
			$forth = array_column($arr, 'hashtag_couples');			
			//print_r($first);
			
			//$cluster1 =array();
			//$cluster2 =array();
			//$cluster3 =array();
			//$cluster4 =array();
			//$cluster5 =array();
			$result2 = pg_query($dbconn, "SELECT *  FROM clustering");
			if (!$result2) {
			    echo "An error occurred while retreiving data.\n";
			    exit;
			}
			$all_cluster = pg_fetch_all($result2);
			$cluster1 =array_column($all_cluster,'cluster1');
			$cluster2 =array_column($all_cluster,'cluster2');
			$cluster3 =array_column($all_cluster,'cluster3');
			$cluster4 =array_column($all_cluster,'cluster4');
			$cluster5 =array_column($all_cluster,'cluster5');
		
			//print_r($cluster5);
			//print_r("HALLOOOO");
			//print_r($all_cluster);




		?>
		
		<script>
			var first_coll= <?php echo json_encode($first); ?>;
			var second_coll= <?php echo json_encode($second); ?>;
			var third_coll= <?php echo json_encode($third); ?>;
			var forth_coll= <?php echo json_encode($forth); ?>;
			var cluster1= <?php echo json_encode($cluster1);?>;
			var cluster2= <?php echo json_encode($cluster2);?>;
			var cluster3= <?php echo json_encode($cluster3);?>;
			var cluster4= <?php echo json_encode($cluster4);?>;
			var cluster5= <?php echo json_encode($cluster5);?>;
			//document.write(cluster5)
		</script>
		<div id="container">
			<style>
			    #graph-container {
			      top: 0;
			      bottom: 0;
			      left: 0;
			      right: 0;
			      position: absolute;
			    }
			</style>
			<div id="graph-container"></div>
		</div>
		<script>
		function value_of_4(row){
			var temp= forth_coll[row];
			var num_array =[];
			temp =temp.toString();
			array1 = temp.split("$$");
			
			for (l=0;l<first_coll.length;l++){
				if (array1.indexOf(first_coll[l])>=0){
				num_array.push(l);
						
				}
			}	
			return num_array;
					
			
		}

			
					
		

		var s;
		var data = {
			nodes:[],
		    	edges:[]
			};
		var id =[]
		var x_coor=0;
		var y_coor =0;
		var edge_count=0;
		var m = 1;
		var c = '#000'
		var trump = "#Trump"
		var trump2016 = "#Trump2016"
		var maga = "#MakeAmericaGreatAgain"
		for (i=0;i<first_coll.length;i++){
			var c = '#000'
			if (cluster1.indexOf(first_coll[i])>=0){
				c = '#00FFFF';
				x_coor = 10000;
				y_coor = Math.round(Math.random() *100)*500;
			}else if (cluster2.indexOf(first_coll[i])>=0){
				c= '#A52A2A';
				x_coor = 40000;
				y_coor = Math.round(Math.random() *100)*500;
			}else if (cluster3.indexOf(first_coll[i])>=0){
				c= '#7FFF00';
				x_coor = 20000;
				y_coor = Math.round(Math.random() *100)*500;
			}else if (cluster4.indexOf(first_coll[i])>=0){
				c= '#006400';
				x_coor = 30000;
				y_coor = Math.round(Math.random() *100)*500;
			}else if(cluster5.indexOf(first_coll[i])>=0) {
				c= '#8B008B';
				x_coor = 50000;
				y_coor = Math.round(Math.random() *100)*500;
				
			}
			if (trump.indexOf(first_coll[i])>=0){
				y_coor= 0;
			}else if (trump2016.indexOf(first_coll[i])>=0){
				y_coor= 50000;
			}else if( maga.indexOf(first_coll[i])>=0){
				y_coor= 25000;
			}

			

			data.nodes.push({	
				id  : "n"+i+1,
				label : first_coll[i],
				x : x_coor,
				y : y_coor,
				size : third_coll[i]*10,
				color: c
				});
			id.push(i+1);
		}
				
		for (j=0;j<first_coll.length;j++){	
			b=value_of_4(j);			
			for (k=0;k<b.length;k++){
				edge_count = edge_count+1;				
				data.edges.push({	
					id :"e"+edge_count,
					source : "n"+j+1,
					target : "n"+b[k]+1,
					color: '#1515DA',
					size: 0.5,
					type: 'curve',
					hover_color: '#000'
				});
			}
		
		}
		
		s= new sigma({
		graph: data,
		renderer: {
			container: 'graph-container',
			type: 'canvas'
		},
		setting:{
			doubleClickEnabled: false,
			minEdgeSize: 0.5,
			maxEdgeSize: 4,
			enableEdgeHovering: true,
			edgeHoverColor: 'edge',
			defaultEdgeHoverColor: '#000',
			edgeHoverSizeRatio: 1,
			edgeHoverExtremities: true
		}
		
		});		
	
		</script>
		
	</body>
</html>
			

<!DOCTYPE html>
<html>
	 <head>
		 <meta charset="utf-8"></meta>
		 <title>Projekt Iteration 3 Teilaufgabe 4</title>
	 </head>
	 <style>
		body {background-color: lightblue;}
	
	 </style>
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
			$first_coll = array();
			$second_coll = array();
			$third_coll = array();
			$forth_coll = array();
			while($rows = pg_fetch_row($result)){
				array_push($first_coll,$result[0]);
				array_push($second_coll,$result[1]);
				array_push($third_coll,$result[2]);
				array_push($forth_coll,$result[3]);
			}
			//print_r($first_coll);
			
			$arr= pg_fetch_all($result) ;
			$first = array_column($arr,'hashtag');
			$second = array_column($arr, 'tweet_indices');
			$third = array_column($arr,'hashtag_count');	
			$forth = array_column($arr, 'hashtag_couples');			
			//print_r($first);
			
		?>
		
		<script>
			var first_coll= <?php echo json_encode($first); ?>;
			var second_coll= <?php echo json_encode($second); ?>;
			var third_coll= <?php echo json_encode($third); ?>;
			var forth_coll= <?php echo json_encode($forth); ?>;
			//document.write(first_coll)
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
			array = temp.split("$$");
			
			for (l=0;l<first_coll.length;l++){
				if (array.indexOf(first_coll[l])>=0){
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
		var edge_count=0;
		var m = 1;
		for (i=0;i<first_coll.length;i++){	
			data.nodes.push({	
				id  : "n"+i+1,
				label : first_coll[i],
				x : Math.random(),
				y : Math.random(),
				size : third_coll[i]*0.1,
				color:'#900'
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
					color: '#1515DA'
				});
			}
		
		}
		
		s= new sigma({
		graph: data,
		container: 'graph-container'
		
		
		});		
			
		//document.write(first_coll[123]);
		</script>
		
	</body>
</html>
			

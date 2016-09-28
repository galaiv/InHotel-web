<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<head>
<title>Calling page methods with jQuery</title>
 
</head>

<body>

<div class="container" style="margin:20px;">

<div class="col-lg-6  col-lg-offset-3">
<h1>Webservice</h1>

</div>

<div class="col-lg-6">


<div class="panel panel-default" style="margin-top:10px;">
  <div class="panel-heading">Enter Your JSON</div>


   <div class="panel-body">

 

<textarea   class="form-control col-lg-12"  rows="5" id="json"  name="json" placeholder="Paste json here"></textarea>
<div  class="col-lg-12"> 

<div class="row input-group" style="margin-top:10px;"> <span class="input-group-addon">Controller</span>
<input class="form-control" id="controller" name="controller" readonly="readonly"  placeholder="Controller"  value="client" />
 </div>



<button  style="margin-top:10px; float:left;" class="btn btn-primary pull-right col-lg-3" type="button" onclick="submit_json()">Run</button>

</div>
</div>
</div>


<div class="clearfix"></div>
 
<div class="panel panel-default" style="margin-top:10px;">
  <div class="panel-heading">Json Method</div>
  <div class="panel-body">
 
      <?php foreach($sample_jsons as $sample_json) {
			
			
			if($category==''||$category!= $sample_json['category']){
			$category  =     $sample_json['category']; 
			?>
          <div style="clear:both"></div>
  <h4 class="list-group" style="padding-left: 27px;"><?php echo $category; ?> </h4>  
             
            <?php 
			
			
			}
			
			
			 ?>
         <li  onclick="loadJson(<?php echo $sample_json['id'];?>)" style="cursor:pointer;cursor:" class="col-lg-6"><?php echo $sample_json['name'];?></li>
        <?php } ?>
 
 
 </div>
 
  </div>
 
 <div class="panel panel-default" style="margin-top:10px;">
  <div class="panel-heading">POST</div>
  <div class="panel-body">
 
      <?php foreach($sample_post as $value){
			
			
			if($category==''||$category!= $value['category']){
			$category  =     $value['category']; 
			?>
          <div style="clear:both"></div>
  <h4 class="list-group" style="padding-left: 27px;"><?php echo $category; ?> </h4>  
             
            <?php 
			
			
			}
			
			
			 ?>
         <li  onclick="loadPost(<?php echo $value['id'];?>)" style="cursor:pointer;cursor:" class="col-lg-6"><?php echo $value['name'];?></li>
        <?php } ?>
 
 
 </div>
 
  </div>


</div>
<div class="col-lg-6">

<div class="col-lg-12">
<div class="panel panel-default" style="margin-top:10px;">
  <div class="panel-heading">Input string passed</div>


   <div class="panel-body">
 

<div class="col-lg-12"  id="divjson">
 &nbsp;&nbsp;
</div>


</div>

</div>

</div>
<div class="col-lg-12" id="description_div" style="display:none;">
<div class="panel panel-default" style="margin-top:10px;">
  <div class="panel-heading">Description</div>


   <div class="panel-body">
 

<div class="col-lg-12"  id="description">
 &nbsp;&nbsp;
</div>


</div>

</div>

</div>




<div class="col-lg-12">

<div class="panel panel-default" style="margin-top:10px;">
  <div class="panel-heading">JSon string result</div>


   <div class="panel-body">


 

 

<div class="col-lg-12"  id="divResult" style="overflow: auto;">
 
 &nbsp;&nbsp;
</div>

</div>

</div>


</div>


 


</div>



</div>




 
</body>
 <script type="text/javascript">

function submit_json()
{
	
	var jsonStr =   $("#json").val();
	var controller =   $("#controller").val();
	
	if(controller!=''){
	
	
	
	if(jsonStr!=''){
	
	 $("#divResult").text("loading...");
		 
              //jsonStr = "{id:'169013', page:'3', leagueids:''}";
              //jsonStr = "{'id': '534151','leagueids': '843,31','page': '1'}";
              jsonMethod = "<?php echo base_url()?>"+controller;   
			   $("#divjson").html(jsonMethod+"=>"+jsonStr);
			  
              $("#divPassed").text(jsonMethod + " => " + jsonStr);
              callJsonMethod(jsonMethod, jsonStr, "#divResult");
       
	}else{
		
	alert('Paste valide JSON');
	
	}
	
	
	}else{
		
	alert('Enter controller name');
	
	}
	
}


function loadJson(id)
{
          
              $("#divResult").text("loading...");
			  
			  
			    <?php foreach($sample_jsons as $sample_json) { ?>
			  
				if(id==<?php echo $sample_json['id'];?>)
				{
				var 	jsonStr = '<?php echo $sample_json['json'];?>';
				var 	controller = '<?php echo $sample_json['controller'];?>';
				var 	description = '<?php echo $sample_json['desc'];?>';
				}
			  
			  <?php } ?>
			  
			  
			    $("#divjson").html(jsonStr);
				
				if(description!='')
				{
				 $("#description").html(description);
				 $("#description_div").show();
				}else{
					 $("#description_div").hide();
				}
				
              //jsonStr = "{id:'169013', page:'3', leagueids:''}";
              //jsonStr = "{'id': '534151','leagueids': '843,31','page': '1'}";
              jsonMethod = "<?php echo base_url()?>"+controller;
			  
			    $("#divjson").html(jsonMethod+"=>"+jsonStr);
			  
              $("#divPassed").text(jsonMethod + " => " + jsonStr);
              callJsonMethod(jsonMethod, jsonStr, "#divResult");
       
		   
		  
}

function loadPost(id)
{
	 
	  <?php foreach($sample_post as $value) { ?>
			  
				if(id==<?php echo $value['id'];?>)
				{
				var 	jsonStr = '<?php echo $value['json'];?>';
				var 	controller = '<?php echo $value['controller'];?>';
				}
			  
			  <?php } ?>
			  
			  jsonMethod = "<?php echo base_url()?>"+controller; 
			  
	 $("#divjson").html(jsonMethod+"=>"+jsonStr);
	  $("#divResult").html('');
}


 </script>
<script type="text/javascript">
	  function callJsonMethod(jsonMethod, jsonStr, divResult) {

			$.ajax({
				type: "POST",
				url: jsonMethod,
				data: jsonStr,
				success: function (msg) {
				 //alert(msg)
					$(divResult).text(msg);
				},
				error: function (msg) {
				//alert($.parseJSON(msg))
					$(divResult).text(msg);
				}
			});
	}
      </script>
</html>

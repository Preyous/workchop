<?php session_start();

 require_once "_vars.php";
require "_parts/_functions.php";

require "vendor/autoload.php";
$curl = new Curl();

 $session = new Session();
 if($session->check_session_basically($user) == false){
	 header("location:login.php");
	 exit();
 }
 
 ?>
<!DOCTYPE html>
	<html>
		<head>
   <?php //call header
   require PARTS."_header.php";
   ?>
   
	<title>Workchop - Home</title>


            <script type="text/javascript">
                <?php ////LET'S DO THE JS STUFF HERE ?>
                <?php /*
                var _basic_part= $(".basic-show");
                var _advanced_part= $(".advanced-show");
                var _basic_click = $("a[href='#basic']");
                var _advanced_click = $("a[href='#advanced']");
                    */?>
                  var request; 
           
          $(document).on("submit","#search-vendor",function(event){ 
            event.preventDefault();
			//$("#search-vendor").serialize();
            searchVendor();
          }); 
           
           
           function searchVendor(){ 
            
           try{ 
		   <?php
		  // $loading = ajax_load("#search-result");
		  
		   $toast_note_js = toast_note_js(".toast-note");
		   $starting_ajax = "
			/*$('#search-result').html('".loader()."');*/";
		   $success = "$('#search-result').html(response);";
		 // $load_inside = ajax_load("#search-result","response",$start_ajax,$toast_note_js);
			
		  $the_data = "location:$(\"#location\").val(),tradesman_type:$(\"#tradesman_type\").val()";
                   echo ajax_send("#search-result","'".AJAX_PART."_search_result.php'","post",$the_data,$success,"html",$starting_ajax);
		?>
          //     request.open('POST',"<?php echo AJAX_PART; ?>_search_result.php",true); 
           } 
           catch(exception){ 
               alert(exception); 
           } 
            
       }

            </script>
		</head>
		<body>
		<div class="container whole-body">
		
		<?php require base_path("_parts/_menu.php"); ?>
			
		 <div class="row">	
			<div class="body_container">
				
			<?php //left part 
				require base_path(PARTS."_left.php"); 
			?>
				
			<div class="col-md-6 center-body">
				<div class="activity-stream inside">
					<div class="head">
					    <form id="search-vendor" method="post"> 
         
						
						<div class="row">
						<div class="col-xs-9">
						<div class="col-sm-6">
						
						  <span class="icon-on-input"><i class="icon fa-users"></i></span>
						<select class="form-control" id="tradesman_type" name="tradesman_type">
						<option value="">Select a tradesman type</option>
							<?php 
							foreach($tradesman_args as $name => $id){
								?>
								<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
								<?php
							}
							?>
						</select>
						</div><?php //column
						?>
						  <div class="col-sm-6">
						  <span class="icon-on-input"><i class="icon fa-location"></i></span>
							<select class="form-control left-out" id="location" name="location">
						<option value="">Select a location</option>
							<?php 
							foreach($location_args as $name => $id){
								?>
								<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
								<?php
							}
							?>
						</select>
						</div><?php //column
						?>
						</div> <?php //column
						?>
						<div class="col-xs-3">
						<button type="submit" id="search-btn" class="btn btn-feel" name="search"><i class="icon fa-search"></i></button>
						</div><?php //column
						?>
						</div> <?php //row 
						?>
						
						</form>
					</div>
					
					<div id="search-result" class="body">
						<div class="big-search">
							<i class="icon fa-search"></i>
							<p class="inscribed">Search for a trandesman</p>
						</div>
					</div>
					<div class="footer">
						
					</div>
				</div>
			</div>
            
			<?php //right side
				require PARTS."_right.php";
			?>
				
			</div><?php ////body_container ?>
			
		  </div><?php ////row ?>
			</div>

<script type="text/javascript">
    $("#home-page").addClass("active");

</script>
        <?php //footer
        require base_path("_parts/_footer.php");
        ?>

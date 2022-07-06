<!-- 
<div id="container">

	<h2>Add Note</h2>

	<div class="row show-grid" style="margin:30px">
	  <div class="span13">
	  
		<?php echo validation_errors(); ?>
		<form method="post" action="<?php echo site_url('notes/add'); ?>" name="notes_add" id="notes_add">
		<table>
			<tr>
				<td><label for="title">Title</label></td>
				<td><input type="text" name="title" value="" /></td>
			</tr>
			
			<tr>
				<td><label for="category">Category</label></td>
				<td><select name="category">
					<option value="General" selected="selected">General</option>
					<option value="Antennas">Antennas</option>
					<option value="Satellites">Satellites</option>
				</select></td>
			</tr>
			
			<tr>
				<td></td>
				<td><textarea name="content" id="markItUp" rows="10" cols="10"></textarea></td>
			</tr>
		</table>

		<div class="actions"><input class="btn primary" type="submit" value="Submit" /></div>

</form>

	  </div>
	  <div class="span2 offset1">
	  </div>
	</div> -->
	
<div class="container-fluid">
<div class="row">
	&nbsp;
</div>
	<div class="row">
	    <!-- Form Control starts -->
	    <div class="col-lg-8">
	        <div class="card">
	            <div class="card-header"><h5 class="card-header-text">Add Note</h5>
	            </div>

	            <div class="card-block">
	                <?php echo validation_errors(); ?>
		<form method="post" action="<?php echo site_url('notes/add'); ?>" name="notes_add" id="notes_add">
	                    <div class="form-inline">
	                    	<div class="col-lg-3">
	                    		<label class="m-r-15 form-control-label">Title </label>
	                    	</div>
							<div class="form-group col-lg-9">
							    <input class="form-control" type="text" name="title" value="" />
							</div>
	                    </div>
	                    <br><br><br>
	                    <div class="form-inline">
	                    	<div class="col-lg-3">
	                    		<label class="m-r-15 form-control-label">Category </label>
	                    	</div>
							<div class="form-group col-lg-9">
							    <select class="form-control" name="category">
									<option value="General" selected="selected">General</option>
									<option value="Antennas">Antennas</option>
									<option value="Satellites">Satellites</option>
								</select>
							</div>
	                    </div>
	                    <br><br><br>
	                    <div class="form-inline">
	                    	<div class="col-lg-3">
	                    		<label class="m-r-15 form-control-label"> </label>
	                    	</div>
							<div class="form-group col-lg-9">
							    <textarea class="form-control" name="content" id="markItUp" rows="10" style="width: 100%;"></textarea>
							</div>
	                    </div>
	                    <br><br><br>
	                    <br><br><br>
	                    <br><br><br>
	                    <div class="row">
							<div class="col-lg-3">
								
							</div>
							<div class="col-lg-9">
								<button type="submit" class="btn btn-primary waves-effect waves-light m-r-30">Submit</button>
		                    	<button type="submit" class="btn btn-default waves-effect waves-light m-r-30">reset</button>
							</div>
						</div>
	                    
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
</div>

<script type="text/javascript"> 

$(document).ready(function()	{
	// Add markItUp! to your textarea in one line
	// $('textarea').markItUp( { Settings }, { OptionalExtraSettings } );
	$('#markItUp').markItUp(mySettings);

	// You can add content from anywhere in your page
	// $.markItUp( { Settings } );	
	$('.add').click(function() {
		$.markItUp( { 	openWith:'<opening tag>',
						closeWith:'<\/closing tag>',
						placeHolder:"New content"
					}
				);
		return false;
	});

	// And you can add/remove markItUp! whenever you want
	// $(textarea).markItUpRemove();
	$('.toggle').click(function() {
		if ($("#markItUp.markItUpEditor").length === 1) {
			$("#markItUp").markItUpRemove();
			$("span", this).text("get markItUp! back");
		} else {
			$('#markItUp').markItUp(mySettings);
			$("span", this).text("remove markItUp!");
		}
		return false;
	});
});

</script> 
<script type="text/javascript" src="<?php echo base_url(); ?>markitup/jquery.markitup.js"></script> 
<!-- markItUp! toolbar settings --> 
<script type="text/javascript" src="<?php echo base_url(); ?>markitup/sets/html/set.js"></script> 
<!-- markItUp! skin --> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>markitup/skins/markitup/style.css" /> 
<!--  markItUp! toolbar skin --> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>markitup/sets/html/style.css" /> 
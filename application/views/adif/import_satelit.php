<!-- <div id="container">
<h2><?php echo $page_title; ?></h2>

<p><span class="label important">Important</span> Log files must have the file type .adi</p>

<?php echo form_open_multipart('adif/import_log_satelit');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input class="btn primary" type="submit" value="Upload" />

</form>

</div> -->
<div id="container">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
	    <!-- Header starts -->
	    <div class="row">
	        <div class="main-header">
	            <h4><?php echo $page_title; ?></h4>
	        </div>
	    </div>
	    <!-- Header end -->

	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-block">
	                	<?php echo form_open_multipart('adif/import_log_satelit');?>
	                	<div class="text-center">
	                		<p><span class="txt-danger"><b>Important</b></span> Log files must have the file type .adi</p>
	                		<input type="file" name="userfile" size="20" />
	                	</div>
	                    <br>
	                    <div class="text-center">
	                        <button type="submit" class="btn btn-primary waves-effect waves-light p-l-50 p-r-50">Upload</button>
	                    </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- Row end -->
	</div>
	<!-- Container-fluid ends -->
</div>
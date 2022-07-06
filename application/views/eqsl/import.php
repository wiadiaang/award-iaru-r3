<!-- <div id="container">
<h2><?php echo $page_title; ?></h2>


<table>
	<tr>
		<td><input type="radio" name="eqslimport" id="upload" value="upload" checked /> Upload a file</td>
		<td>
			<p>Upload the Exported ADIF file from eQSL from the <a href="http://eqsl.cc/qslcard/DownloadInBox.cfm" target="_blank">Download Inbox</a> page, to mark QSOs as confirmed on eQSL.</p>
			<p><span class="label important">Important</span> Log files must have the file type .adi</p>
			<input type="file" name="userfile" size="20" />
		</td>
	</tr>
	<tr>
		<td><input type="radio" name="eqslimport" id="fetch" value="fetch" /> Pull eQSL data for me</td>
		<td>
			<p>Cloudlog will use the eQSL username an password stored in your user profile to download confirmations from eQSL for you. We will only download confirmations received since your last eQSL confirmed QSO.</p>
		</td>
	</tr>
</table>
<input class="btn primary" type="submit" value="Import" />

</form>

</div> -->

<div id="container">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
	    <!-- Header starts -->
	    <div class="row">
	        <div class="main-header">
	            <h4><?php echo $page_title; ?></h4>
	            <?php $this->load->view('layout/messages'); ?>
	        </div>
	    </div>
	    <!-- Header end -->

	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-block">
	                	<?php echo form_open_multipart('eqsl/import');?>
						<table>
							<tr>
								<td><input type="radio" name="eqslimport" id="upload" value="upload" checked /> Upload a file</td>
								<td>
									<p>Upload the Exported ADIF file from eQSL from the <a href="http://eqsl.cc/qslcard/DownloadInBox.cfm" target="_blank">Download Inbox</a> page, to mark QSOs as confirmed on eQSL.</p>
									<p><span class="txt-danger"><b>Important</b></span> Log files must have the file type .adi</p>
									<input type="file" name="userfile" size="20" />
								</td>
							</tr>
							<tr>
								<td><input type="radio" name="eqslimport" id="fetch" value="fetch" /> Pull eQSL data for me</td>
								<td>
									<p>Cloudlog will use the eQSL username an password stored in your user profile to download confirmations from eQSL for you. We will only download confirmations received since your last eQSL confirmed QSO.</p>
								</td>
							</tr>
						</table>
						<input class="btn btn-primary waves-effect waves-light" type="submit" value="Import" />

						</form>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- Row end -->
	</div>
	<!-- Container-fluid ends -->
</div>
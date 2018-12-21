<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1>Introrealestate Featured Properties Plugin</h1>
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h2><span>Select the properties that you would like to add to your featured properties.</span></h2>

						<div class="inside">
							<form name="featured_properties_form" method="post" action="" style="margin-bottom: 50px;" onsubmit="after_submition();">
							<input type="hidden" name="featured_properties_form_submitted" value="Y">
                            <table class="form-table">
                                <tr>
                                    <th class="row-title">Position</th>
                                    <th>Property</th>
                                </tr>
                                <tr valign="top">
									<td style="width:10% !important;">
										<label>#1</label>
									</td>
                                    <td scope="row">
                                    <select class="js-example-basic-single" onchange="check_select_values();" style="width: 60%;" name="properties_ids[]">
									<?php 
										foreach ( $results as $key=>$result ) {
									?>
										<?php 
											if($key == 0) {

										?>
                                        <option value="<?php echo $result->id ?>" selected="selected"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>
									<?php 
											} else {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php 
											}									
									?>
									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr valign="top" class="alternate">
								<td style="width:10% !important;">
									<label>#2</label>
								</td>
								<td scope="row">
                                    <select class="js-example-basic-single" style="width: 60%;" onchange="check_select_values();" name="properties_ids[]">
									<?php 
										foreach ( $results as $key=>$result ) {
									?>
										<?php 
											if($key == 1) {

										?>
                                        <option value="<?php echo $result->id ?>" selected="selected"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>
									<?php 
											} else {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php 
											}									
									?>
									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr valign="top">
								<td style="width:10% !important;">
									<label>#3</label>
								</td>
								<td scope="row">
                                    <select class="js-example-basic-single" style="width: 60%;" onchange="check_select_values();" name="properties_ids[]">
									<?php 
										foreach ( $results as $key=>$result ) {
									?>
										<?php 
											if($key == 2) {

										?>
                                        <option value="<?php echo $result->id ?>" selected="selected"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>
									<?php 
											} else {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php 
											}									
									?>
									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
								<tr valign="top" class="alternate">
								<td style="width:10% !important;">
									<label>#4</label>
								</td>
								<td scope="row">
                                    <select class="js-example-basic-single" style="width: 60%;" onchange="check_select_values();" name="properties_ids[]">
									<?php 
										foreach ( $results as $key=>$result ) {
									?>
										<?php 
											if($key == 3) {

										?>
                                        <option value="<?php echo $result->id ?>" selected="selected"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>
									<?php 
											} else {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php 
											}									
									?>
									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
								<tr valign="top">
								<td style="width:10% !important;">
									<label>#5</label>
								</td>
								<td scope="row">
                                    <select class="js-example-basic-single" style="width: 60%;" onchange="check_select_values();" name="properties_ids[]">
									<option value="" selected="selected" disabled="true">-- Select Property --</option>

									<?php 
										foreach ( $results as $result ) {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
								<tr valign="top" class="alternate">
								<td style="width:10% !important;">
									<label>#6</label>
								</td>
								<td scope="row">
                                    <select class="js-example-basic-single" style="width: 60%;" onchange="check_select_values();" name="properties_ids[]">
									<option value="" selected="selected" disabled="true">-- Select Property --</option>

									<?php 
										foreach ( $results as $result ) {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
								<tr valign="top">
								<td style="width:10% !important;">
									<label>#7</label>
								</td>
								<td scope="row">
                                    <select class="js-example-basic-single" style="width: 60%;" onchange="check_select_values();" name="properties_ids[]">
									<option value="" selected="selected" disabled="true">-- Select Property --</option>

									<?php 
										foreach ( $results as $result ) {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
								<tr valign="top" class="alternate">
								<td style="width:10% !important;">
									<label>#8</label>
								</td>
								<td scope="row">
                                    <select class="js-example-basic-single" style="width: 60%;" onchange="check_select_values();" name="properties_ids[]">
									<option value="" selected="selected" disabled="true">-- Select Property --</option>

									<?php 
										foreach ( $results as $result ) {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
								<tr valign="top">
								<td style="width:10% !important;">
									<label>#9</label>
								</td>
								<td scope="row">
                                    <select class="js-example-basic-single" style="width: 60%;" onchange="check_select_values();" name="properties_ids[]">
									<option value="" selected="selected" disabled="true">-- Select Property --</option>


									<?php 
										foreach ( $results as $result ) {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
								<tr valign="top" class="alternate">
								<td style="width:10% !important;">
									<label>#10</label>
								</td>
								<td scope="row">
                                    <select class="js-example-basic-single" style="width: 60%;" onchange="check_select_values();" name="properties_ids[]">
									<option value="" selected="selected" disabled="true">-- Select Property --</option>

									<?php 
										foreach ( $results as $result ) {
									?>
                                        <option value="<?php echo $result->id ?>"><?php echo $result->name ?> <?php echo "( " . $result->property_address . " )" ?></option>

									<?php } ?>
                                    </select>
                                    </td>
                                </tr>
                            </table>
							<p style="width: 100%;">
							<div class="spinner is-active" id="updating-spinner" style="float:none;width:auto;height:auto;padding:10px 0 10px 50px;background-position:20px 0; position: absolute; right: 80px; bottom: 18px; display: none;"></div>
								<button class="button-primary" type="submit" name="submit_featured_properties" style="text-align: right; position: absolute; right: 25px; bottom: 15px;">Update</button>
							</p>
							</form>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<h2><span><?php esc_attr_e(
									'Recently Featured Properties', 'WpAdminStyle'
								); ?></span></h2>

						<div class="inside">
							<?php 
								foreach($property_with_images as $featured_property) {
							?>

								<p style="font-weight: bold;"><?php echo $featured_property->name ?></p>
								<p><?php echo "(" . $featured_property->property_address . ")" ?></p>
								<br />

							<?php } 
							
							?>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->
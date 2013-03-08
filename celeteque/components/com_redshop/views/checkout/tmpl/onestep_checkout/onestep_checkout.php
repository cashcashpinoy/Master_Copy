<p>&nbsp;</p>
<table style="width: 699px;" border="0" cellpadding="2" cellspacing="2">
	<tbody>
		<tr>
			<td><strong><span style="font-size: 1.3em;"><img src="images/banners/hl_orderconfirmation.png" alt="" border="0" /></span></strong>
			</td>
		</tr>
		<tr>
			<td><strong><span style="font-size: 1.3em;">1. Customer Information</span></strong>
			</td>
			<td>
				<div style="float: left; margin-left: -306px; margin-top: -7px;"><a href="index.php?option=com_redshop&amp;view=manufacturers&amp;layout=products&amp;Itemid=246"><img src="images/btn_shopmore.png" border="0" /></a>
				</div>
			</td>
			<td>
				<div style="float: left; margin-left: -190px; margin-top: -11px;">{checkout_button}</div>
			</td>
		</tr>
		<tr>
			<td>
				<table style="border-bottom: 1px solid; border-width: 1px; width: 98%; margin-top: 10px;">
					<tbody>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table border="0">
					<tbody>
						<tr>
							<td>{shippingbox_template:shipping_box}</td>
						</tr>
						<tr>
							<td>{shipping_template:shipping_method}</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<!--Billing Add Info and Shipping Add Info Alignment-->
		<tr>
			<td>
				<table>
					<tbody>
						<tr>
							<td valign="top">
								<fieldset class="adminform">
									<legend><strong>Billing Address Information</strong> </legend> {edit_billing_address} <br /> {billing_address}</fieldset>
							</td>
							<td valign="top">
								<fieldset class="adminform">
									<legend><strong> {shipping_address_information_lbl}</strong> </legend> {shipping_address}</fieldset>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<!--END TEST-->
		<tr>
			<td>
				<p><strong><span style="font-size: 1.3em;">2. Delivery Option<br /></span></strong>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<div>
					<div style="float: left; vertical-align: bottom;"><input name="pic" value="0" checked="checked" type="radio" />
					</div>
					<div style="float: middle;"><img src="images/xend3.jpg" alt="" style="float: left;" height="25" width="143" border="0" />
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<table style="border-bottom: 1px solid; border-width: 1px; width: 98%; margin-top: 5px; margin-bottom: 10px;">
					<tbody>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td><strong><span style="font-size: 1.3em;">3. Payment Method</span></strong>
			</td>
		</tr>
		<tr>
			<td>{payment_template:payment_method}</td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td>
				<div style="float: left;"><input name="radio" value="0" checked="checked" type="radio" />Credit Card<img src="images/creditfinal.jpg" alt="" style="margin-top: -29px; margin-bottom: -9px;" border="0" />
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<table style="border-bottom: 1px solid; border-width: 1px; width: 98%; margin-bottom: 10px; margin-top: 5px;">
					<tbody>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td><strong><span style="font-size: 1.3em;">4. Order Details</span></strong>
			</td>
		</tr>
		<tr>
			<td>
				<table border="0">
					<tbody>
						<tr>
							<td style="width: 1000px;">{checkout_template:checkout}</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
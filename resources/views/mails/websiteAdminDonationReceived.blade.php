<!DOCTYPE html>
<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
	<!-- NAME: CUTOUT -->
	<!--[if gte mso 15]>
	<xml>
		<o:OfficeDocumentSettings>
		<o:AllowPNG/>
		<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	<title></title>
	<meta charset="UTF-8">
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta name="format-detection" content="telephone=no">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
	<!--[if !mso]><!-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Poppins:wght@400;500;600;700&display=swap"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap"
		rel="stylesheet">
	<style>
		@media screen and (max-width: 699px) {
			table {
				width: 100% !important;
			}
		}
	</style>

</head>

<body style="background-color: #fde9e9; padding:0px; margin:0px; font-family: 'Poppins', sans-serif; font-size: 16px; color:
	#202a32;">
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
		<tbody>
			<tr>
				<td>
					<table align="center" cellpadding="10" cellspacing="10" border="0" class="row-content"
						style="mso-table-lspace: 0pt;mso-table-rspace: 0pt; width: 700px; background-color:#fff;">
						<tbody>
							<tr>
								<td>
									<table cellpadding="0" cellspacing="0" border="0" width="100%"
										style="background-color:#110f39;">
										<tbody>
											<tr>
												<td>
													<div class="bgblue">
														<table cellpadding="0" cellspacing="0" border="0" width="100%"
															style="position: relative; z-index:5;">
															<tbody>
																<tr>
																	<td>
																		<table cellpadding="0" cellspacing="0"
																			border="0" width="100%"
																			style="position:relative;">
																			<tbody>
																				<tr>
																					<td
																						style="text-align: center; padding: 10px;">
																						<img src="https://superschool.org/casinonight/assets/images/logo.png" width="100">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</td>
											</tr>
										</tbody>
									</table>

									<table cellpadding="0" cellspacing="0" border="0" width="100%"
										class="row-description" style="max-width: 500px; margin: 0 auto;">
										<tbody>
											
											<tr>
												<td>
													<p style="margin: 30px 0 0; font-size: 16px; font-weight:500">
														Dear
														<strong>
															Super School Team,
														</strong>
													</p>
												</td>
											</tr>
                                            <tr>
												<td style="height: 20px;"></td>
											</tr>
											<tr>
												<td>
													<p style="margin: 10px 0 0; font-size: 16px; font-weight:500">
													We are thrilled to inform you that a new donation has been made on Super School. Here are the details of the donation:
													</p>
												</td>
											</tr>
											
											<tr>
												<td style="height: 20px;"></td>
											</tr>
											<tr>
												<td>
													<table cellpadding="0" cellspacing="0" border="0" width="100%">
														<tr>
															<td style="height: 20px;"></td>
														</tr>
														<tr>
															<td style="text-align: left; float: left;">
																<strong>Donor Details:</strong>
															</td>
														</tr>
														<tr>
															<td style="height: 10px;"></td>
														</tr>
														<tr>
															<td style="text-align: left;">
																<table cellpadding="0" cellspacing="0" width="100%"
																	style="background-color: #fcfbe4;border-radius: 6px;width: 100%;">
																	<tr>
																		<td style="padding: 10px;">Donor Name:</td>
																		<td style="padding: 10px;">
																			<strong>{{$data['name']}}</strong>
																		</td>
																	</tr>
																	<tr>
																		<td style="padding: 10px;">Donor Email:</td>
																		<td style="padding: 10px;">
																			<strong>{{$data['email']}}</strong>
																		</td>
																	</tr>
																	<tr>
																		<td style="padding: 10px;">Donation Amount:
																		</td>
																		<td style="padding: 10px;">
																			<strong>${{$data['amount']}}</strong>
																		</td>
																	</tr>

                                                                    <tr>
																		<td style="padding: 10px;">
																			Donation Date:
																		</td>
																		<td style="padding: 10px;">
																			<strong>{{$data['donation']['created_at']->format('M d, Y')}}</strong>
																		</td>
																	</tr>
                                                                    <tr>
																		<td style="padding: 10px;">
																			Payment Method:
																		</td>
																		<td style="padding: 10px;">
																			<strong>Card</strong>
																		</td>
																	</tr>
                                                                    <tr>
																		<td style="padding: 10px;">
																			Transaction ID:
																		</td>
																		<td style="padding: 10px;">
																			<strong>{{$data['donation']['transection_id']}}</strong>
																		</td>
																	</tr>
                                                                    
																	
																	
																</table>
															</td>
														</tr>
														<tr>
															<td style="height: 20px;"></td>
														</tr>
														<tr>
															<td>
																<p style="margin: 10px 0 0; font-size: 16px; font-weight:500">
																Thank you note has been sent out to the donor to express your gratitude for their generous support.
																</p>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>

									<div class="footerbg">
										<table cellpadding="0" cellspacing="0" border="0" width="100%"
											style="padding-top:10px; padding-bottom:10px; text-align: center; background-color:#ffffff;">
											<tbody>
												<tr>
													<td style="border-top:solid 1px #eee;">

													</td>
												</tr>
												<tr>
													<td>
														<table cellpadding="0" cellspacing="0" border="0" width="100%"
															style="max-width: 500px; margin: 0 auto;">
															<tr>
																<td style="height: 20px;"></td>
															</tr>
															<tr>
																<td style="text-align: left; float: left;">
																	<strong>Thanks, </strong>
																</td>
															</tr>
															<tr>
																<td style="height: 10px;"></td>
															</tr>
															<tr>
																<td style="text-align: left; float: left;">
																	<!-- <img src="dummy-avatar.jpg" alt="image"
																		style="height: 40px; width: 40px; border-radius: 100px; display: inline-block;vertical-align: middle;"> -->
																	<span
																		style="font-size: 16px;display: inline-block;vertical-align: middle;">
																		Super School team
																	</span>
																</td>
															</tr>
															<tr>
																<td style="height: 20px;"></td>
															</tr>
														</table>
													</td>
												</tr>


											</tbody>
										</table>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>
<!DOCTYPE html>
<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
<title>Download Invoice</title>
<meta charset="UTF-8">
<meta name="description" content="Download ticket">
<meta name="keywords" content="Download ticket">
<meta name="author" content="Super School">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
		@media screen and (max-width: 699px) {
			table {
				width: 100% !important;
			}
		}
	</style>

</head>

<body style="background-color: #f5f5f5; padding:0px; font-family: 'Poppins', sans-serif; color:
	#202a32;">
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tbody>
		<tr>
				<td>
					<table  align="top" cellpadding="0" cellspacing="0" border="0" width="100%" style="width: 700px;margin:0 auto;background-color: #ffffff; padding:10px;">
						<tr>
							<td style="text-align:center; padding:0px;">
								<img src="https://superschool.org/casinonight/assets/images/logo.png"
															style="max-width: 100%;">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table align="center" cellpadding="0" cellspacing="0" border="0" class="row-content" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt; width: 700px; background-color:#ffffff;border:solid 1px
						#eee; ">
						<tbody>
							<tr>
								<td>
									<table align="top" cellpadding="0" cellspacing="0" border="0" width="100%">
										<tbody>
											<tr>
												<td  style="vertical-align: center;width: 190px; border-right:solid 1px #eee;padding:10px">
													<img src="{{($fundraisingOrderTicket->ticket)?'https://superschool.org/school-management/storage/app/storage/images/'.$fundraisingOrderTicket->ticket->image:''}}"  width="100%"
														style="max-width: 100%;">
												</td>
												<td style="vertical-align: top;">
													<table align="top" cellpadding="0" cellspacing="0" border="0"
														width="100%" style="position: relative; vertical-align: top;">
														<tbody>
															<tr>
																<td
																	style="border-bottom:solid 1px #eee; height: 30px; font-size: 16px;  text-align: center;">
																	<table cellpadding="0" cellspacing="0" border="0"
																		width="100%" style="position:relative;">
																		<tbody>
																			<tr>
																				<td
																					style="text-align: center;font-weight: bold;">
																					{{ ($fundraisingOrderTicket->ticket)?$fundraisingOrderTicket->ticket->name:'' }}
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
															<tr>
																<td>
																	<table align="center" cellpadding="0"
																		cellspacing="0" border="0" width="100%"
																		 style="position: relative; vertical-align: top;background-image:url('../assets/images/soldout.png');background-size:100%; background-repeat:no-repeat;background-position: center; position:relative; z-index:1;">
																		<tbody>
																			<tr>
																				<td
																					style="text-align: right; padding: 6px;border-top: dotted 1px #eee; font-size: 12px;">
																					Name
																				</td>
																				<td>
																					:
																				</td>
																				<td style="text-align: left; padding: 6px; border-top: dotted 1px #eee;font-size: 12px; font-weight:
																					600;">
																					{{ ($fundraisingOrderTicket->user)?$fundraisingOrderTicket->user->name:'' }}
																				</td>
																			</tr>
																			<tr>
																				<td
																					style="text-align: right; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;">
																					Email
																				</td>
																				<td>
																					:
																				</td>
																				<td style="text-align: left; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;font-weight:
																					600;">
																					{{ ($fundraisingOrderTicket->user)?$fundraisingOrderTicket->user->email:'' }}
																				</td>
																			</tr>
																			<tr>
																				<td
																					style="text-align: right; padding: 6px;border-top: dotted 1px #eee; font-size: 12px;">
																					Mobile no
																				</td>
																				<td>
																					:
																				</td>
																				<td style="text-align: left; padding: 6px; border-top: dotted 1px #eee;font-size: 12px; font-weight:
																					600;">
																					{{ ($fundraisingOrderTicket->user)?$fundraisingOrderTicket->user->phone:'' }}
																				</td>
																			</tr>
																			<tr>
																				<td
																					style="text-align: right; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;">
																					Quantity
																				</td>
																				<td>
																					:
																				</td>
																				<td style="text-align: left; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;font-weight:
																					600;">
																					{{ $fundraisingOrderTicket->quantity }}
																				</td>
																			</tr>
																			<tr>
																				<td
																					style="text-align: right; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;">
																					Price
																				</td>
																				<td>
																					:
																				</td>
																				<td style="text-align: left; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;font-weight:
																					600;">
                                                                                    @if($fundraisingOrderTicket && $fundraisingOrderTicket->sold_as=="Sponsorship" || ($fundraisingOrderTicket && $fundraisingOrderTicket->sold_as=="Casino Games"))
																					    Free
                                                                                    @else
                                                                                        ${{ $fundraisingOrderTicket->price }}
                                                                                    @endif
                                                                                   
																				</td>
																			</tr>
																			<tr>
																				<td
																					style="text-align: right; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;">
																					Sold As
																				</td>
																				<td>
																					:
																				</td>
																				<td style="text-align: left; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;font-weight:
																					600;">
                                                                                    @if($fundraisingOrderTicket && $fundraisingOrderTicket->sold_as=="Sponsorship" || ($fundraisingOrderTicket && $fundraisingOrderTicket->sold_as=="Casino Games"))
																					    {{$fundraisingOrderTicket->sold_as}}
                                                                                    @else
                                                                                       Tickets
                                                                                    @endif
                                                                                   
																				</td>
																			</tr>
                                                                             @if($fundraisingOrderTicket && $fundraisingOrderTicket->sold_as=="Sponsorship" || ($fundraisingOrderTicket && $fundraisingOrderTicket->sold_as=="Casino Games"))
                                                                             @else
																			<tr>
																				<td
																					style="text-align: right; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;">
																					Total Amount
																				</td>
																				<td>
																					:
																				</td>
																				<td style="text-align: left; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;font-weight:
																					600;">
																					${{ $fundraisingOrderTicket->price*$fundraisingOrderTicket->quantity}}
																				</td>
																			</tr>
                                                                            @endif
																			<tr>
																				<td
																					style="text-align: right; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;">
																					Transection Id
																				</td>
																				<td>
																					:
																				</td>
																				<td style="text-align: left; padding: 6px; border-top: dotted 1px #eee;font-size: 12px;font-weight:
																					600;">
																					{{ $transection_id }}
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>

												<td
													style="width: 150px; text-align: center; border-left:dotted 2px #eee;">
													<table cellpadding="0" cellspacing="0" border="0" width="100%">
														<tr>
															<td style="font-size: 14px; padding:6px; color: #202a32;">
																<sapn style="font-size: 12px;">Date
																</sapn>
																<span
																	style="font-size: 12px;font-weight:600;">{{ $fundraisingOrderTicket->created_at->format('M d, Y') }}</span>
															</td>
														</tr>
														<tr>
															<td style="padding: 10px;">
                                                                    <img width="100%"
																	style="max-width: 100%;" src="data:image/png;base64,{{DNS2D::getBarcodePNG((string)$fundraisingOrderTicket->bar_code, 'QRCODE')}}" alt="barcode" />
															</td>
														</tr>
														<tr>
															<td style="font-size: 14px; padding:6px; color: #202a32;">
																	{{ $fundraisingOrderTicket->ticket_code }}
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>


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
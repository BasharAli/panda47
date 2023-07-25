<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
</style>
</head>
<body>
<table style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: rgb(60,130,206); width: 100%;user-select: none;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#1f272c">
	<tbody>
		<tr style="vertical-align: top;" valign="top">
			<td style="word-break: break-word; vertical-align: top;" valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="background-color:rgb(255,211,21);" align="center">
				<div style="background-color: transparent;">
					<div style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;"><table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"><table style="width:640px" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="background-color:transparent"> <td style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="640" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:10px; padding-bottom:10px;">
							
						</td></tr></tbody></table> </td></tr></tbody></table></td></tr></tbody></table></div>
					</div>
				</div>
				
				<div style="background-color: transparent;">
					<div style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: #000000;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: #000000;"><table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"><table style="width:640px" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="background-color:#000000"> <td style="background-color:rgb(60,130,206);width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="640" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 30px; padding-left: 30px; padding-top:30px; padding-bottom:30px;">
							<div style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
								<div style="width: 100% !important;">
									<div style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;border: 2px solid rgb(60,130,206);background: rgb(60,130,206);">
										<div style="width: 100% !important;">
											<div style="border: 0px solid transparent; padding: 10px 0px 10px 0px;">
												<div style="padding-right: 15px; padding-left: 15px;" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="line-height:0px"><td style="padding-right: 15px;padding-left: 15px;" align="center">
													<div style="font-size: 1px; line-height: 15px;">&nbsp;</div>
													<img style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 128px; display: block;" alt="" src="{{asset('main')}}/images/logo/logo-5.png" width="128" border="0" align="middle">
													<div style="font-size: 1px; line-height: 15px;">&nbsp;</div>
												</td></tr></tbody></table></div>
											</div>
										</div>
									</div>
									<div style="border: 0px solid transparent; padding: 30px;"> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 0px; padding-bottom: 15px; font-family: Tahoma, sans-serif">
										<div style="color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; line-height: 1.5; padding: 0px 0px 30px 0px;">
											<div style="line-height: 1.5; font-size: 12px; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;">
												<p style="font-size: 18px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 27px; margin: 0;"><span style="font-size: 30px;"><strong>{{__('Welcome to Panda 47')}}</strong>. </span><br><br><span style="font-size: 17px; ">
													{{$introLines[0]}}
											</div>
										</div>
									</td></tr></tbody></table>
									<div style="padding: 10px;" align="center">
                                    	{{-- Action Button --}}
										@isset($actionText)
										<?php
											switch ($level) {
												case 'success':
												case 'error':
													$color = $level;
													break;
												default:
													$color = 'primary';
											}
										?>
										@component('mail::button', ['url' => $actionUrl, 'color' => $color])
										{{ $actionText }}
										@endcomponent
										@endisset
                                    </div>
									</div>
									<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%" cellspacing="0" cellpadding="0">
										<tbody>
											<tr style="vertical-align: top;" valign="top">
												<td style="word-break: break-word; vertical-align: top; text-align: center; width: 100%; padding: 0px 0px 20px 0px;" width="100%" valign="top" align="center">
													<h1 style="color: #ffffff; direction: ltr; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; font-size: 24px; font-weight: normal; letter-spacing: normal; line-height: 150%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>
														@if ($introLines[1])
															{{$introLines[1]}}
														@endif
														
														<br>
														@if (count($introLines) > 2)
															{{$introLines[2]}}
														@endif
														
													</strong></h1>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</td></tr></tbody></table> </td></tr></tbody></table></td></tr></tbody></table></div>
					</div>

				</div>
				
				<div style="background-color: transparent;">
					<div style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;"><table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"><table style="width:640px" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="background-color:transparent"> <td style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="640" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;">
							<div style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
								<div style="width: 100% !important;">
									<div style="border: 0px solid transparent; padding: 0px;">
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 0px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 30px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
															<tbody>
																<tr style="vertical-align: top;" valign="top">
																	<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="30">&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</td></tr></tbody></table> </td></tr></tbody></table></td></tr></tbody></table></div>
					</div>
				</div>
				<div style="background-color: transparent;">
					<div style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;"><table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"><table style="width:640px" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="background-color:transparent"> <td style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="640" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;">
							<div style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
								<div style="width: 100% !important;">
									<div style="border: 0px solid transparent; padding: 0px;">
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 0px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 30px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
															<tbody>
																<tr style="vertical-align: top;" valign="top">
																	<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="30">&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</td></tr></tbody></table> </td></tr></tbody></table></td></tr></tbody></table></div>
					</div>
				</div>
				<div style="background-color: transparent;">
					<div style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;"><table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"><table style="width:640px" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="background-color:transparent"> <td style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="640" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
							<div style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
								<div style="width: 100% !important;">
									<div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												
											</tbody>
										</table>
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%" cellspacing="0" cellpadding="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; padding: 10px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" cellspacing="0" cellpadding="0" align="center">
															<tbody>
																
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
										<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 15px; padding-left: 15px; padding-top: 5px; padding-bottom: 5px; font-family: Tahoma, sans-serif">
											<div style="color: #455f6c; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; line-height: 1.2; padding: 5px 15px 5px 15px;">
												<div style="line-height: 1.2; font-size: 12px; color: #1e1e1e; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
													<p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;">Copyright &copy; <script>document.write( new Date().getFullYear() );</script> PANDA 47. All rights reserved.</p>
												</div>
											</div>
											</td></tr></tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 15px; padding-left: 15px; padding-top: 5px; padding-bottom: 5px; font-family: Tahoma, sans-serif">
											<div style="color: #455f6c; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; line-height: 1.2; padding: 5px 15px 5px 15px;">
												
											</div>
										</td></tr></tbody></table> </div>
								</div>
							</div>
						</td></tr></tbody></table> </td></tr></tbody></table></td></tr></tbody></table></div>
					</div>
				</div>
				<div style="background-color: transparent;">
					<div style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;"><table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"><table style="width:640px" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="background-color:transparent"> <td style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="640" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;">
							<div style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
								<div style="width: 100% !important;">
									<div style="border: 0px solid transparent; padding: 0px;">
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 0px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 30px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
															<tbody>
																<tr style="vertical-align: top;" valign="top">
																	<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="30">&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</td></tr></tbody></table> </td></tr></tbody></table></td></tr></tbody></table></div>
					</div>
				</div>
			</td></tr></tbody></table></td>
		</tr>
	</tbody>
</table>
</body>
</html>

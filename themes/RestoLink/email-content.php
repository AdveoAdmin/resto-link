<?php
$page  = jet_engine()->options_pages->registered_pages['notifications-mails'];
$logoID = $page->get( 'mail-logo' );
$logo = wp_get_attachment_url( $logoID );
$headerID = $page->get( 'mail-header-image' );
$header = wp_get_attachment_url( $headerID );
$footer = $page->get( 'mail-footer' );
$css = $page->get( 'mail-css' );
$backgroundColor = $page->get( 'mail-bg-color' );
?>

<head>
    <style type="text/css">
        <?php echo $css; ?>
    </style>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" style="background-color: <?php echo $backgroundColor; ?>;">
	<tbody>
        <tr>
            <td width="100%" height="30"></td>
        </tr>
		<tr>
			<td align="center">
				<table class="mobile" align="center" border="0" width="100%" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td align="center">
								<table width="640" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
									<tbody>
										<tr>
											<td width="100%" valign="middle" align="center">
												<table width="640" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; font-size: 10px; line-height: 20px; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #fff;" class="fullCenter">
													<tbody>
                                                        <tr>
                                                            <td width="100%" height="15"></td>
                                                        </tr>
														<tr>
															<td valign="middle" width="100%" style="font-family: Helvetica, Arial, sans-serif, 'Open Sans'; color: #ffffff; font-weight: 500;">
                                                                <img src="<?php echo $logo; ?>" width="240" />
															</td>
														</tr>
                                                        <tr>
                                                            <td width="100%" height="30"></td>
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
			</td>
        </tr>
        <tr>
            <td align="center">
				<table class="mobile" align="center" border="0" width="100%" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
                            <td align="center">
                                <table width="640" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
									<tbody>
										<tr>
											<td width="100%" valign="middle" align="center">
												<table width="640" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; font-size: 14px; line-height: 20px; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #fff;" class="fullCenter">
													<tbody>
														<tr>
															<td valign="middle" width="100%" style="font-family: Helvetica, Arial, sans-serif, 'Open Sans'; color: #14324A; font-weight: 500;">
                                                                <img src="<?php echo $header; ?>" width="640px" />
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
			</td>
		</tr>
        <tr>
            <td align="center">
				<table class="mobile" align="center" border="0" width="100%" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
                            <td align="center">
                                <table width="640" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
									<tbody>
										<tr>
											<td width="100%" valign="middle" align="center">
												<table width="640" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; font-size: 14px; line-height: 20px; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #fff;" class="fullCenter">
													<tbody>
                                                        <tr>
                                                            <td width="100%" height="30"></td>
                                                        </tr>
														<tr>
															<td valign="middle" width="100%" style="font-family: Helvetica, Arial, sans-serif, 'Open Sans'; color: #14324A; font-weight: 500; padding: 0 30px;">
                                                                
                                                                <?php echo $form->replaceVariables($notification->config('html'), 'html'); ?>
                                                                
															</td>
														</tr>
                                                        <tr>
                                                            <td width="100%" height="30"></td>
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
			</td>
		</tr>
        <tr>
			<td align="center">
				<table class="mobile" align="center" border="0" width="100%" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td align="center">
								<table width="640" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
									<tbody>
										<tr>
											<td width="100%" valign="middle" align="center">
												<table width="640" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; font-size: 10px; line-height: 20px; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #22D6C1" class="fullCenter">
													<tbody>
                                                        <tr>
                                                            <td width="100%" height="15"></td>
                                                        </tr>
														<tr>
															<td valign="middle" width="100%" style="font-family: Helvetica, Arial, sans-serif, 'Open Sans'; color: #ffffff; font-weight: 500;">
                                                                <?php echo $footer; ?>
															</td>
														</tr>
                                                        <tr>
                                                            <td width="100%" height="15"></td>
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
			</td>
        </tr>
        <tr>
            <td width="100%" height="60"></td>
        </tr>
	</tbody>
</table>
</body>
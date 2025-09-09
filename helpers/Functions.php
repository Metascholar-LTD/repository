<?php

/**
 * Public Functions Specific for this Framework
 * @category  General
 */


/**
 * Get Logged In User Details From The Session
 * @param $field Get particular field value of the active user  otherwise return array of active user fields 
 * @return string | array
 */
function newMail($email, $mailtitle, $mailbody){
	$ctrl = new ApiController;
	$ctrl->newMail($email, $mailtitle, $mailbody);
}
 function file_thumb($filePath = NULL, $size = "70px"){
	if(empty($filePath))return null; 
	$fileInfo = pathinfo($filePath);
	$fileExtension = $fileInfo['extension'];
	if(strtolower((string)$fileExtension) == 'ppt'){
		$img = 'powerpoint.png';
	}
	else if(strtolower((string)$fileExtension) == 'docx' || strtolower((string)$fileExtension) == 'doc'){
		$img = 'word.png';
	}
	else if(strtolower((string)$fileExtension) == 'csv'){
		$img = 'excel.png';
	} else if(strtolower((string)$fileExtension) == 'pdf'){
		$img = 'pdf.png';
	} else {
		$img = 'notes2.png';
	}
	echo '<img src="'.SITE_ADDR.IMGDIR.$img.'" width="'.$size.'" alt="'.$img.'"/>';
}
function text_thumb($filePath = NULL, $size = "70px"){
	if(empty($filePath))return null; 
	$fileInfo = pathinfo($filePath);
	$fileExtension = $fileInfo['extension'];
	if(strtolower($fileExtension) == 'ppt' || strtolower($fileExtension) == 'zip'){
		$color = 'alert-warning';
	}
	else if(strtolower($fileExtension) == 'docx' || strtolower($fileExtension) == 'doc' || strtolower($fileExtension) == 'fasta'){
		$color = 'alert-primary';
	}
	else if(strtolower($fileExtension) == 'csv'){
		$color = 'alert-success';
	} else if(strtolower($fileExtension) == 'pdf'){
		$color = 'alert-danger';
	} else {
		$color = 'surface';
	}
	echo '<span class="btn bold font2 '.$color.'">'.strtoupper($fileExtension).'</span>';
}
function get_active_user($field = null, $default_value = null)
{
	if (!empty($field)) {
		$user_data = get_session('user_data');
		if (!empty($user_data) && !empty($user_data[$field])) {
			return $user_data[$field];
		}
		return $default_value;
	} else {
		return get_session('user_data');
	}
}
function genID($suffix,$id){
	$currentDate = date('ymd');
	$randomNumber = mt_rand(100, 999);
	$uniqueId = 'CUG/'.$suffix.'/'.$currentDate . $randomNumber.'/'.$id;
	return $uniqueId;
}
function slugify($text)
{
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text ?? '');
	return $text;
}
function render_data($url = null){
	$loader = '<div class="p-5 text-center bg-white" style="font-size: 2em"><i class="pi pi-spinner pi-spin"></i></div>';
	$html = '<data data-url="'.SITE_ADDR.$url.'" state="0">'.$loader.'</data>';
	$html = !empty($url) ? $html : null;
	return $html;
}
// function getFileDetails($url) {
// 	if(empty($url)) return array(
// 		'size' => 'NULL',
// 		'extension' => 'NULL'
// 	);
//     $headers = get_headers($url, true);
//     // Check if the URL is valid and headers are returned
//     if ($headers && isset($headers['Content-Length']) && isset($headers['Content-Type'])) {
//         $fileSize = $headers['Content-Length'];
// 		$fileSize = round($fileSize / (1024 * 1024), 2); // Convert bytes to MB
//         $fileExtension = pathinfo($url, PATHINFO_EXTENSION);
//         return array(
//             'size' => $fileSize.' MB',
//             'extension' => $fileExtension
//         );
//     } else {
//         // Return an error message or handle accordingly
//         return false;
//     }
// }
function getFileDetails($url) {
	if(empty($url)) return array(
		'size' => 'NULL',
		'extension' => 'NULL'
	);
    $fileContents = file_get_contents($url);
    $fileSize = ($fileContents !== false)?strlen($fileContents):NULL;
    $extension = pathinfo($url, PATHINFO_EXTENSION);
    
    return array(
        'size' => round($fileSize / (1024 * 1024), 2) . ' MB',
        'extension' => $extension
    );
}
function myActionCount($action){
	$ctrl = new ApiController;
	$val = $ctrl->count('activities', 'uid', USER_ID, 'action', $action);
	return $val;
}
function downloadCount($val){
	$ctrl = new ApiController;
	$data = $ctrl->count('activities', 'ctrl', $val);
	return $data;
}
function colorBadge($r){
	$r = strtolower($r ?? '');
	if($r == 'student' || $r == '1'){
		$color = 'alert-success'; 
	} else if($r == 'staff'){
		$color = 'alert-primary'; 
	} else if($r == '0'){
		$color = 'alert-pink'; 
	} else if($r == 'admin' || $r == '0.5'){
		$color = 'alert-warning'; 
	} else if($r == 'super admin' || $r == '-1'){
		$color = 'alert-danger'; 
	} else if($r == 'female'){
		$color = 'text-warning'; 
	} else if($r == 'male'){
		$color = 'text-primary'; 
	} else {
		$color = 'alert-secondary'; 
	}
	$r = $r==0?'pending':$r;
	$r = $r==1?'Approved':$r;
	$r = $r=='0.5'?'Revised':$r;
	$r = $r=='-1'?'Declined':$r;

	$p = ($r != 'male' && $r != 'female') ? 'px-2 p-1': null;
	echo '<span class="'.$p.' round-3 '.$color.'">'.$r.'</span>';
}
function isActive($ref, $page){
    return strtolower((string)$ref) == $page ? true : false;
};
function regAction($tablename, $rec_id, $action){
	$ctrl = new ApiController;
	return $ctrl->regAction($tablename, $rec_id, $action);
}
function setStatusDom($status, $ctrl){
	echo '
	<span class="centeredL">
	   '.colorBadge($status).'<i class="pi pi-cog ml-2"></i>
    </span>
     
    <div class="dropdown right-0 left-unset top-0 bottom-unset">
        <form class="p-3 text-black text-md">
            <div class="">
                <div class="bold text-400">Record Status</div>
                <div class="small">'.$ctrl.'</div>
            </div>
            <hr class="short border-danger"/>
            <select class="form-control" name="status">
                <option value="0">Select from here ...</option>
                <option value="0.0">Pending</option>
                <option value="1">Approve</option>
                <option value="0.5">Revised</option>
                <option value="-1">Reject</option>
            </select>
            <hr/>
            <div class="small text-muted">
                Select from the options above to assign status to this record.
            </div>
        </form>
    </div>
	';
}
function adminCount($table, $arg1 = null){
	$ctrl = new ApiController;
	return $ctrl->adminCount($table, $arg1);
}
function calculateDateDueCycle($date1) {
    // Convert the input date string to a DateTime object
    $dateTime1 = new DateTime($date1);

    // Calculate the date one year later
    $dateTimeOneYearLater = $dateTime1->add(new DateInterval('P1Y'));

    // Calculate the difference between current date and date1 in days
    $currentDate = new DateTime();
    $dateDifference = $currentDate->diff($dateTime1)->format('%a');

    // Return the results
    return [
        'oneYearLater' => $dateTimeOneYearLater->format('jS M. Y'),
        'dateDifference' => $dateDifference,
        'daysUsed' => 365 - $dateDifference,
    ];
}
function assignedFaculty(){
	$ctrl = new ApiController;
	$uid = USER_ID;
	$v = $ctrl->val("SELECT role FROM assigned_department WHERE uid = '$uid'");
	return $v;
}
function amCharts(){
    Html :: page_js("amcharts5/index.js");
    Html :: page_js("amcharts5/percent.js");
    Html :: page_js("amcharts5/xy.js");
    Html :: page_js("amcharts5/themes/Animated.js");
}
function htmlText($v){
	$ctrl = new ApiController;
	$val = $ctrl->val("select sval FROM settings WHERE slab = '$v' OR id  = '$v'");
	return $val;
}
function get_set_id($v){
	$ctrl = new ApiController;
	$val = $ctrl->val("select id FROM settings WHERE slab = '$v' OR id  = '$v'");
	return $val;
}
function statusEmailTitle($value, $append = NULL){
	$title =  'Notification Regarding Your Submission - '.$append;
	switch ($value) {
		case '1': $title = 'Your Submission (ID: '.$append.') Has Been Approved'; break;
		case '0.5': $title = 'Feedback and Revision Request for Your Thesis Submission (ID: '.$append.')'; break;
		case '-1': $title = 'Regrettable Outcome: Rejection of Your Submission (ID: '.$append.')'; break;
	}
	return $title;
}


// mail start
function smartMail($table, $value, $ctrl, $name = 'User', $title = 'Title', $email = 'miracleatianashie81@gmail.com'){
    // Determine the correct template based on $table and $value
    $acceptTemplate = $table == 'research_document' ? thesisApprovalTemp() : approvalTemp();
    $reviseTemplate = $table == 'research_document' ? thesisRevissionTemp() : revissionTemp();
    $rejectTemplate = $table == 'research_document' ? thesisRejectionTemp() : rejectionTemp();

    $temp = '';

    // Select the appropriate template based on $value
    switch ($value) {
        case '1': 
            $temp = $acceptTemplate; 
            break;
        case '0.5': 
            $temp = $reviseTemplate; 
            break;
        case '-1': 
            $temp = $rejectTemplate; 
            break;
        default: 
            // Handle unexpected $value cases
            $temp = "Unknown status template"; 
            break;
    }

    // Determine the correct field (though it's not used in this function)
    switch ($table) {
        case 'past_questions': 
            $field = 'course_title'; 
            break;
        default: 
            $field = 'title'; 
            break;
    }

    // Generate the email subject and body
    $subject = statusEmailTitle($value, $ctrl);
    $mailbody = str_replace(['{{$name}}', '{{$title}}'], [$name, $title], $temp);

    // Send the email
    newMail($email, $subject, $mailbody);
}

// function smartMail($table, $value, $ctrl, $name, $title,$email = 'miracleatianashie81@gmail.com'){
// 	$acceptTemplate = $table == 'research_document'?thesisApprovalTemp():approvalTemp();
// 	$reviseTemplate = $table == 'research_document'?thesisRevissionTemp():revissionTemp();
// 	$rejectTemplate = $table == 'research_document'?thesisRejectionTemp():rejectionTemp();

// 	$temp = '';
// 	// $name = isset($name) ? $name : 'User'; 
// 	// $title = isset($title) ? $title : 'Title';

// 	switch ($value) {
// 		case '1': $temp = $acceptTemplate; break;
// 		case '0.5': $temp = $reviseTemplate; break;
// 		case '-1': $temp = $rejectTemplate; break;
// 	}

// 	switch ($table) {
// 		case 'past_questions': $field = 'course_title'; break;
// 		default: $field = 'title'; break;
// 	}
// 	$subject = statusEmailTitle($value, $ctrl);
// 	$mailbody = $temp;
// 	$mailbody = str_replace('{{$name}}',$name,$mailbody);
// 	$mailbody = str_replace('{{$title}}',$title,$mailbody);
	
// 	newMail($email, $subject, $mailbody);
// }
// email templates for thesis
function thesisRejectionTemp(){ 
    $time = human_datetime(datetime_now());
    $site_addr = SITE_ADDR;
    return '
    <div style="width:100% !important;font-family: Arial, sans-serif;overflow:hidden;">
        <div class="" style="width: 100% !important;">
            
		    '.mailHeader().'
            
            <div  style="padding:20px;background:white;">
                <div style="font-size:14px;">Dear {{$name}}, </div>
                <p style="font-size:14px;">We hope this message finds you well.</p>
                <p style="font-size:14px;">After careful consideration and thorough evaluation, we regret to inform you that your thesis titled <b>"{{$title}} "</b> has been <b style="color:red;">rejected</b> for inclusion in the Catholic University of Ghana Institutional Repository.</p>
                
                <p style="font-size:14px;">We recognize the hard work and dedication you have put into your research. However, the submission does not fully meet the necessary criteria and standards required for acceptance in our repository.</p>
                
				<hr style="border-color:black"/>
                <p style="font-size:14px; margin:18px 0px;">Thank you for your effort and commitment to academic excellence. We look forward to the possibility of including your revised work in our repository in the future.</p>
            </div>
            
            '.mailFooter().'
        </div>
    </div>';
}
function thesisApprovalTemp(){ 
    $time = human_datetime(datetime_now());
    $site_addr = SITE_ADDR;
    return '
    <div style="width:100% !important;font-family: Arial, sans-serif;overflow:hidden;">
        <div class="" style="width: 100% !important;">
            
		    '.mailHeader().'
            
            <div  style="padding:20px;background:white;">
                <div style="font-size:14px;">Dear {{$name}}, </div>

                <p style="font-size:14px; margin:18px 0px;">Congratulations on this significant achievement!</p>

                <p style="font-size:14px;">We are pleased to inform you that your submission, titled <b>"{{$title}}"</b>, has been officially <b style="color:green;">accepted/approved</b> for inclusion in the Catholic University of Ghana Institutional Repository. This accomplishment reflects the hard work, dedication, and scholarly rigor you have demonstrated throughout your research.</p>
                
                <hr style="border-color:black"/>
                <p style="font-size:14px;">Your contribution will not only be a valuable addition to our academic community but will also serve as a resource for future scholars and researchers. We commend you for your commitment to advancing knowledge in your field of study.</p>
                
            </div>
            
            '.mailFooter().'
        </div>
    </div>';
}
function thesisRevissionTemp(){ 
	$guidLink = htmlText('thesisGuide');
    $time = human_datetime(datetime_now());
    $site_addr = SITE_ADDR;
    return '
    <div style="width:100% !important;font-family: Arial, sans-serif;overflow:hidden;">
        <div class="" style="width: 100% !important;">
            
		    '.mailHeader().'
            
            <div  style="padding:20px;background:white;">
                <div style="font-size:14px;">Dear {{$name}}, </div>

                <p style="font-size:14px; margin:18px 0px;">
				After careful consideration and thorough evaluation, we regret to inform you that your thesis titled <b>"{{$title}},"</b> needs revision for inclusion in the Catholic University of Ghana Institutional Repository.</p>

				<p style="font-size:14px; margin:18px 0px;">Obtain a copy of the <a style="color:blue;" href="'.$guidLink.'">thesis submission guidelines and criteria</a>, then update your thesis to ensure it meets all specified standards.</p>

				<p style="font-size:14px; margin:18px 0px;">We encourage you to review the <a style="color:blue;" href="'.$guidLink.'">submission guidelines and criteria</a> and consider revising your thesis accordingly. Our unit is available to provide guidance and support should you wish to resubmit your work after making the necessary adjustments.</p>

                <hr style="border-color:black"/>
                <p style="font-size:14px;">Thank you for your effort and commitment to academic excellence. We look forward to the possibility of including your revised work in our repository in the future</p>
                
            </div>
            
            '.mailFooter().'
        </div>
    </div>';
}
// email for rest
function rejectionTemp(){ 
    $time = human_datetime(datetime_now());
    $site_addr = SITE_ADDR;
    return '
    <div style="width:100% !important;font-family: Arial, sans-serif;overflow:hidden;">
        <div class="" style="width: 100% !important;">
            
            '.mailHeader().'
            
            <div  style="padding:20px;background:white;">
                <div style="font-size:14px;">Dear {{$name}}, </div>
                <p style="font-size:14px;">Thank you for your interest in contributing to the Catholic University of Ghana Institutional Repository</p>
				
                <p style="font-size:14px;">After careful consideration, we regret to inform you that your recent submission <b>"{{$title}} "</b> cannot be accepted for inclusion in our repository.</p>
                
                <p style="font-size:14px;">We appreciate your effort and encourage you to consider our feedback for any future submissions. If you have any queries or require further clarification, please do not hesitate to contact us.</p>
                
				<hr style="border-color:black"/>
                <p style="font-size:14px; margin:18px 0px;">Thank you once again for your submission and your interest in enriching our Institutional Repository.</p>
            </div>

            '.mailFooter().'
        </div>
    </div>';
}
function revissionTemp(){ 
	$guidLink = htmlText('docsGuide');
    $time = human_datetime(datetime_now());
    $site_addr = SITE_ADDR;
    return '
    <div style="width:100% !important;font-family: Arial, sans-serif;overflow:hidden;">
        <div class="" style="width: 100% !important;">
            
            '.mailHeader().'
            
            <div  style="padding:20px;background:white;">
                <div style="font-size:14px;">Dear {{$name}}, </div>
                <p style="font-size:14px;">I hope this message finds you well</p>
				
                <p style="font-size:14px;">I hope this message finds you well. We have received your recent submission titled <b>"{{$title}}"</b>, to the Catholic University of Ghana Institutional Repository. After an initial review, we find that your submission requires certain revisions for compliance with our repository standards.</p>
                
                <p style="font-size:14px;">Obtain a copy of the <a style="color:blue;" href="'.$guidLink.'">guidelines and criteria</a>, then update your submission to ensure it meets all specified standards.</p>

				<p style="font-size:14px;">We kindly ask you to make these revisions and resubmit your document at your earliest convenience. Should you require any assistance or clarification regarding these revisions, please do not hesitate to contact us</p>
                
				<hr style="border-color:black"/>
                <p style="font-size:14px; margin:18px 0px;">Thank you for your contribution to our repository. We look forward to showcasing your valuable work.</p>
            </div>

            '.mailFooter().'
        </div>
    </div>';
}
function approvalTemp(){ 
    $time = human_datetime(datetime_now());
    $site_addr = SITE_ADDR;
    return '
    <div style="width:100% !important;font-family: Arial, sans-serif;overflow:hidden;">
        <div class="" style="width: 100% !important;">
            
            '.mailHeader().'
            
            <div  style="padding:20px;background:white;">
                <div style="font-size:14px;">Dear {{$name}}, </div>
                <p style="font-size:14px;">We are pleased to inform you that your submission titled <b>"{{$title}}"</b>, has been successfully approved for inclusion in the Catholic University of Ghana Institutional Repository. Your contribution is a valuable addition to our academic community and supports our mission of sharing knowledge and fostering research.</p>
                
				<hr style="border-color:black"/>
                <p style="font-size:14px;">Thank you for your valuable contribution. Should you have any further inquiries or require assistance, please do not hesitate to contact us.</p>
            </div>

            '.mailFooter().'
        </div>
    </div>';
}
function newRegistration($name){ 
    $time = datetime_now();
    $site_addr = SITE_ADDR;
    return '
		<!doctype html>
		<html lang="en-US">

		<head>
			<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
			<title>New Account Email Template</title>
			<meta name="description" content="New Account Email Template.">
			<style type="text/css">
				a:hover {text-decoration: underline !important;}
			</style>
		</head>

		<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
			<!-- 100% body table -->
			<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
				style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: sans-serif;">
				<tr>
					<td>
						<table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
							align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td style="height:80px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="text-align:center;">
									<a href="#" title="logo" target="_blank">
									<img width="60" src="https://twozik.com/images/brand.jpg" title="logo" alt="logo">
								</a>
								</td>
							</tr>
							<tr>
								<td style="height:20px;">&nbsp;</td>
							</tr>
							<tr>
								<td>
									<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
										style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
										<tr>
											<td style="height:40px;">&nbsp;</td>
										</tr>
										<tr>
											<td style="padding:0 35px;">
												<h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:sans-serif;">Congratulations! '.$name.'</h1>
												<p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
													Your account with <b>Catholic University of Ghana Digital Space</b> has been successfully created.
												</p>
												<h3>Welcome to the community!</h3>
												<p style="font-size:14px;">
													You can now log in using the credentials you provided during the registration process. If you have any questions or need assistance, feel free to contact our support team at <a>CUG Academic Computing and Research Unit</a>.
												</p>
												<span
													style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;">
												</span>

												<a href="'.SITE_ADDR.'home"
													style="background:#20e277;text-decoration:none !important; display:inline-block; font-weight:500; margin-top:24px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Login
													to your Account</a>
											</td>
										</tr>
										<tr>
											<td style="height:40px;">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="height:20px;">&nbsp;</td>
							</tr>
							<tr>
								<td style="text-align:center;">
								'.mailFooter().'
								</td>
							</tr>
							<tr>
								<td style="height:80px;">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<!--/100% body table-->
		</body>

		</html>';
}
function mailFooter(){
	$site_addr = SITE_ADDR;
	return '
	<div style="background-color:black;color:white;padding:20px;">
        <div class="">
            <div class="">Academic Computing & Research Unit</div>
            <h2 class="" style="font-weight:bold;margin-top:0px;">Catholic University of Ghana</h2>
			<div style="font-size:12px;margin-bottom:5px;">Email: <a style="color:white;" href="mailto:cug@'.DOMAIN.'">cug@'.DOMAIN.'</a></div>
			<div style="font-size:12px;">Phone: <a style="color:white;" href="tel:+233593464021">+(233) 593 464 021</a></div>
            <p style="width:70%;">We look forward to providing you with a seamless and enjoyable experience.</p>
            <hr style="border-color:#dbb367"/>
            <p style="letter-space:4px;">
                <a style="color:white;" href="'.$site_addr.'">CUG Home</a> | 
                <a style="color:white;" href="'.$site_addr.'explore">Explore</a> | 
                <a style="color:white;" href="'.$site_addr.'account">Account</a> | 
                <a style="color:white;" href="'.$site_addr.'/team">Our Team</a>
            </p>
        </div>
    </div>
	';
}
function mailHeader(){
	$site_addr = SITE_ADDR;
	return '
	<div style="background-color:white;padding:20px 20px 0px 20px;">
        <img src="https://twozik.com/images/brand.jpg" alt="logo" style="width:200px;max-width:100%"/>
    </div>
    
    <div class="fit-object" style="background:rgb(240,240,240);height:150px;width:100%;position: relative;">
        <img src="https://twozik.com/images/WhatsAppImage2.jpg" alt="Banner" 
        style="width: 100% !important;
        height: 100%;
        object-fit: cover;
        position: absolute !important;
        top: 0px !important;
        left: 0px !important;"/>
    </div>
	';
}
// [] end []
/**
 * Convert a multi-dimensional, associative array to CSV data
 * @param  array $data the array of data
 * @return string       CSV text
 * https://coderwall.com/p/zvzwwa/array-to-comma-separated-string-in-php
 */
function arr_to_csv($data)
{
	# Generate CSV data from array
	$fh = fopen('php://temp', 'rw'); # don't create a file, attempt # to use memory instead
	# write out the headers
	fputcsv($fh, array_keys(current($data)));
	# write out the data
	foreach ($data as $row) {
		fputcsv($fh, $row);
	}
	rewind($fh);
	$csv = stream_get_contents($fh);
	fclose($fh);
	return $csv;
}

/**
 * Recursively implodes an array with optional key inclusion
 * 
 * Example of $include_keys output: key, value, key, value, key, value
 * 
 * @access  public
 * @param   array   $array         multi-dimensional array to recursively implode
 * @param   string  $glue          value that glues elements together	
 * @param   bool    $include_keys  include keys before their values
 * @param   bool    $trim_all      trim ALL whitespace from string
 * @return  string  imploded array
 */
function recursive_implode(array $array, $glue = ',', $include_keys = false, $trim_all = false)
{
	$glued_string = '';
	// Recursively iterates array and adds key/value to glued string
	array_walk_recursive($array, function ($value, $key) use ($glue, $include_keys, &$glued_string) {
		$include_keys and $glued_string .= $key . $glue;
		$glued_string .= $value . $glue;
	});
	// Removes last $glue from string
	strlen($glue) > 0 and $glued_string = substr($glued_string, 0, -strlen($glue));
	// Trim ALL whitespace
	$trim_all and $glued_string = preg_replace("/(\s)/ixsm", '', $glued_string);
	return (string) $glued_string;
}

/*
 * Sometimes REMOTE_ADDR does not returns the correct IP address of the user. 
 * The reason behind this is to use Proxy. In that situation, use the following code to get real IP address of user in PHP.
*/
function get_user_ip()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		//ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		//ip pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

/**
 * Get The Current Request Method
 * @example (post,get,put,delete,...)
 * @return string
 */
function request_method()
{
	return strtolower($_SERVER['REQUEST_METHOD'] ?? '');
}

/**
 * Get The Current Request Method
 * @example (post,get,put,delete,...)
 * @return string
 */

function is_post_request()
{
	return (request_method() == 'post');
}




/**
 * Dispatch Content in JSON Formart
 * @param $data Data to be Output
 * @param $errors Errors If Any
 * @param $status Html Request Status
 * @return JSON String
 */

function render_json($data, $status = 'ok')
{
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($data);
	exit;
}

function render_error($response = null, $code = 501)
{
	if (is_array($response)) {
		$response = json_encode($response);
	}
	header("HTTP/1.1 $code $response", true, $code);
	exit;
}

/**
 * encode data to json and convert special characters to unicode 
 * for display in HTMl attribute
 * @return  string
 */
function json_encode_quote($data)
{
	return json_encode($data, JSON_HEX_APOS | JSON_HEX_QUOT);
}


/**
 * Check if there is active User Logged In
 * @return boolean
 */
function user_login_status()
{
	return (!empty(get_session('user_data')) ? true : false);
}

/**
 * Convinient Function To Redirect to a url
 * @example redirect_to_page("https://phprad.com");  
 * @return  null
 */
function redirect($url)
{
	header("location:$url");
}

/**
 * Convinient Function To Redirect to Another Page
 * @example redirect_to_page("users/view/".USER_ID);  
 * @return  null
 */
function redirect_to_page($path = null)
{
	header("location:" . SITE_ADDR . $path);
}

/**
 * Convinient Function To Redirect to Page Action
 * @example redirect_to_action("index");  
 * @return  null
 */
function redirect_to_action($action_name)
{
	$page = Router::$page_name;
	header("location:" . SITE_ADDR . $page . "/" . $action_name);
}

/**
 * Set Image Src 
 * Convinient Function To Resize Image Via Url of the Image Src if the src is from the same origin then image can be resize
 * @example <img src="<?php echo set_img_src('uploads/images/89njdh4533.jpg',50,50); ?>" />
 * @return  string
 */
function set_img_src($imgsrc, $width = null, $height = null, $returnindex = 0)
{
	if (!empty($imgsrc)) {
		$arrsrc = explode(",", $imgsrc);
		$src = $arrsrc[$returnindex];
		$imgpath = "helpers/timthumb.php?src=$src";
		$imgpath .= ($height != null ? "&h=$height" : null);
		$imgpath .= ($width != null ? "&w=$width" : null);
		return $imgpath;
	}
	return null;
}


/**
 * Set Application Session Variable 
 * @return  object
 */
function set_session($session_name, $session_value)
{
	clear_session($session_name);
	$_SESSION[APP_ID . $session_name] = $session_value;
	return $_SESSION[APP_ID . $session_name];
}

/**
 * Update Session Value (if Session is an Array) 
 * @return  object
 */
function update_session($session_name, $field, $value)
{
	$_SESSION[APP_ID . $session_name][$field] = $value;
	return $_SESSION[APP_ID . $session_name];
}

/**
 * Clear Session
 * @return  boolean
 */
function clear_session($session_name)
{
	$_SESSION[APP_ID . $session_name] = null;
	unset($_SESSION[APP_ID . $session_name]);
	return true;
}

/**
 * Return Session Value
 * @return  object
 */
function get_session($session_name)
{
	if (!empty($_SESSION[APP_ID . $session_name])) {
		return $_SESSION[APP_ID . $session_name];
	}
	return null;
}

/**
 * Return Session Array key Value (if Session is an Array)
 * @return  object
 */
function get_session_field($session_name, $field)
{
	if (isset($_SESSION[APP_ID . $session_name])) {
		return $_SESSION[APP_ID . $session_name][$field];
	}
	return null;
}

/**
 * Force Download of The File
 * @return boolean
 */
function download_file($file_path, $savename = null, $showsavedialog = false)
{
	if (!empty($file_path)) {

		if ($showsavedialog == false) {
			header('Content-Type: application/octet-stream');
		}

		if (empty($savename)) {
			$savename = basename($file_path);
		}

		header('Content-Transfer-Encoding: binary');
		header('Content-disposition: attachment; filename="' . $savename . '"');
		header('Content-Description: File Transfer');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');

		ob_clean();
		flush();
		readfile($file_path);

		return true;
	}
	return false;
}

/**
 * Retrieve Content of From external Url
 * @example echo httpGet("http://phprad.com/system/phpcurget/");
 * @return string
 */
function http_get($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($ch,CURLOPT_HEADER, false); 
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}


/**
 * Retrieve Content of From external Url Using POST Request
 * @example echo http_post("http://phprad.com/system/phpcurlpost/");
 * @return string
 */
function http_post($url, $params = array())
{
	$postData = '';
	//create name value pairs seperated by &
	foreach ($params as $k => $v) {
		$postData .= $k . '=' . $v . '&';
	}
	$postData = rtrim($postData, '&');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POST, count($postData));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
	$output = curl_exec($ch);

	curl_close($ch);
	return $output;
}


/**
 * will return current DateTime in Mysql Default Date Time Format
 * @return  string
 */
function datetime_now()
{
	return date("Y-m-d H:i:s");
}

/**
 * will return current Time in Mysql Default Date Time Format
 * @return  string
 */
function time_now()
{
	return date("H:i:s");
}

/**
 * will return current Date in Mysql Default Date Time Format
 * @return  string
 */
function date_now()
{
	return date("Y-m-d");
}

/**
 * will return 
 * @return  string
 */
function format_date($date_str, $format = 'Y-m-d H:i:s')
{
	if (!empty($date_str)) {
		return date($format, strtotime($date_str));
	}
	return date($format);
}


/**
 * Parse Date Or Timestamp Object into Relative Time (e.g. 2 days Ago, 2 days from now)
 * @return  string
 */
function relative_date($date)
{
	if (empty($date)) {
		return "No date provided";
	}

	$periods         = array("sec", "min", "hour", "day", "week", "month", "year", "decade");
	$lengths         = array("60", "60", "24", "7", "4.35", "12", "10");

	$now             = time();

	//check if supplied Date is in unix date form
	if (is_numeric($date)) {
		$unix_date        = $date;
	} else {
		$unix_date         = strtotime($date);
	}


	// check validity of date
	if (empty($unix_date)) {
		return "Bad date";
	}

	// is it future date or past date
	if ($now > $unix_date) {
		$difference     = $now - $unix_date;
		$tense         = "ago";
	} else {
		$difference     = $unix_date - $now;
		$tense         = "from now";
	}

	for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
		$difference /= $lengths[$j];
	}

	$difference = round($difference);

	if ($difference != 1) {
		$periods[$j] .= "s";
	}

	return "$difference $periods[$j] {$tense}";
}


/**
 * Parse Date Or Timestamp Object into Human Readable Date (e.g. 26th of March 2016)
 * @return  string
 */
function human_date($date)
{
	if (empty($date)) {
		return "Null date";
	}
	if (is_numeric($date)) {
		$unix_date        = $date;
	} else {
		$unix_date         = strtotime($date);
	}
	// check validity of date
	if (empty($unix_date)) {
		return "Bad date";
	}
	return date("jS F, Y", $unix_date);
}

/**
 * Parse Date Or Timestamp Object into Human Readable Date (e.g. 26th of March 2016)
 * @return  string
 */
function human_time($date)
{
	if (empty($date)) {
		return "Null date";
	}
	if (is_numeric($date)) {
		$unix_date        = $date;
	} else {
		$unix_date         = strtotime($date);
	}
	// check validity of date
	if (empty($unix_date)) {
		return "Bad date";
	}
	return date("h:i:s", $unix_date);
}

/**
 * Parse Date Or Timestamp Object into Human Readable Date (e.g. 26th of March, 2016 02:30)
 * @return  string
 */
function human_datetime($date)
{
	if (empty($date)) {
		return "Null date";
	}
	if (is_numeric($date)) {
		$unix_date = $date;
	} else {
		$unix_date = strtotime($date);
	}
	// check validity of date
	if (empty($unix_date)) {
		return "Bad date";
	}
	return date("jS F, Y h:i", $unix_date);
}

/**
 * returns true if $needle is a substring of $haystack
 * @return  bool
 */
if (!function_exists('str_contains')) {
    function str_contains($needle, $haystack)
    {
        return strpos($haystack, $needle) !== false;
    }
}
/**
 * Approximate to nearest decimal points
 * @return  string
 */
function approximate($val, $decimal_points = 2)
{
	return number_format($val, $decimal_points);
}

/**
 * Return String formatted in currency mode
 * @return  string
 */
function to_currency($val, $lang = 'en-US')
{
	$f = new NumberFormatter($lang, \NumberFormatter::CURRENCY);
	return $f->format($val);
}

/**
 * return a numerical representation of the string in a readable format
 * @return  string
 */
function to_number($val, $lang = 'en')
{
	$f = new NumberFormatter($lang, NumberFormatter::SPELLOUT);
	return $f->format($val);
}

/**
 * Trucate string
 * @return  string
 */
function str_truncate($string, $length = 50, $ellipse = '...')
{
	if (strlen($string) > $length) {
		$string = substr($string, 0, $length) . $ellipse;
	}
	return $string;
}

/**
 * Convert Number to words
 * @return  string
 */
function number_to_words($val, $lang = "en")
{
	$f = new NumberFormatter($lang, NumberFormatter::SPELLOUT);
	return $f->format($val);
}


/**
 * Set Cookie Value With Number of Days Before Expiring
 * @return  string
 */
function set_cookie($name, $value, $days = 30)
{
	$expiretime = time() + (86400 * $days);
	setcookie(APP_ID . $name, $value, $expiretime, "/");
}

/**
 * Get Cookie Value
 * @return  object
 */
function get_cookie($name)
{
	if (!empty($_COOKIE[APP_ID . $name])) {
		return $_COOKIE[APP_ID . $name];
	}
	return null;
}

/**
 * Clear Cookie Value
 * @return  boolean
 */
function clear_cookie($name)
{
	setcookie(APP_ID . $name, "", time() - 3600, "/");
	return true;
}
function array_change_key_name($array, $newkey, $oldkey)
{
	foreach ($array as $key => $value) {
		if (is_array($value)) {
			$array[$key] = array_change_key_name($value, $newkey, $oldkey);
		} else {
			$array[$newkey] =  $array[$oldkey];
		}
	}
	unset($array[$oldkey]);
	return $array;
}
/**
 * Generate a random string and characters from set of supplied data context
 * @return  string
 */
function random_chars($limit = 12, $context = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*_+-=')
{
	$l = ($limit <= strlen($context) ? $limit : strlen($context));
	return substr(str_shuffle($context), 0, $l);
}

/**
 * Generate a Random String From Set Of supplied data context
 * @return  string
 */
function random_str($limit = 12, $context = 'abcdefghijklmnopqrstuvwxyz1234567890')
{
	$l = ($limit <= strlen($context) ? $limit : strlen($context));
	return substr(str_shuffle($context), 0, $l);
}

/**
 * Generate a Random String From Set Of supplied data context
 * @return  string
 */
function random_num($limit = 10, $context = '1234567890')
{
	$l = ($limit <= strlen($context) ? $limit : strlen($context));
	return substr(str_shuffle($context), 0, $l);
}



/**
 * Generate a Random color String 
 * @return  string
 */
function random_color($alpha = 1)
{
	$red = rand(0, 255);
	$green = rand(0, 255);
	$blue = rand(0, 255);
	return "rgba($red,$blue,$green,$alpha)";
}

/**
 * Generate a strong hash value String 
 * @return  string
 */
function hash_value($text)
{
	$saltText = APP_ID;
	return md5($text . $saltText);
}

//xss mitigation functions
function xssafe($data, $encoding = 'UTF-8')
{
	return htmlspecialchars($data, ENT_QUOTES | ENT_HTML401, $encoding);
}

/**
 * Will Return A clean Html entities free from xss attacks
 * @return  string
 */
function xecho($data)
{
	echo xssafe($data);
}

/**
 * Concat Array  Values With Comma if REQUEST Value is Array
 * Specific for this Framework Only
 * @arr $_GET data
 * @return  String
 */
function get_value($fieldname, $default = null)
{
	$get =  filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
	if (!empty($get[$fieldname])) {
		$val = $get[$fieldname];
		if (is_array($val)) {
			return implode(', ', $val);
		} else {
			return $val;
		}
	}
	return $default;
}

/**
 * Construct New Url With Current Url. Unset Query String if available
 * @param $arr_qs Array of New Query String Key Values
 * @return  string
 */
function unset_get_value($arr_qs, $page_path = null)
{
	$get =  filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
	unset($get['request_uri']);
	if (is_array($arr_qs)) {
		foreach ($arr_qs as $key) {
			unset($get[$key]);
		}
	} else {
		unset($get[$arr_qs]);
	}
	$qs = null;
	if(!empty($get)){
		$qs = http_build_query($get);
	}
	
	if(!empty($page_path)){
		return $page_path . (!empty($qs) ? "?$qs" : null);
	}
	else{
		return Router::$page_url . (!empty($qs) ? "?$qs" : null);
	}
}

/**
 * Get Form Control POST BACK Value
 * @example <input value="<?php echo get_form_field_value('user_name'); ?>" />
 * @return  string
 */
function get_form_field_value($field, $default_value = null)
{
	$post =  filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
	if (!empty($post[$field])) {
		return $post[$field];
	} else {
		return $default_value;
	}
}

/**
 * Get Form Radio || Checkbox Value On POST BACK
 * @example <input type="radio" <?php echo get_form_field_checked('gender','Male'); ?> />
 * @return  string
 */
function get_form_field_checked($field, $value)
{
	$post =  filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
	if (!empty($post[$field]) && $post[$field] == $value) {
		return "checked";
	}
	return null;
}

function is_active_link($field, $value)
{
	$get =  filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
	if (!empty($get[$field]) && $get[$field] == $value) {
		return "active";
	}
	return null;
}

/**
 * Set Full Address of a Path
 * @return  string
 */
function set_url($path = null)
{
	//check if is a valid url 
	if (filter_var($path, FILTER_VALIDATE_URL) !== FALSE) {
		return  $path;
	} else {
		return SITE_ADDR . $path;
	}
}

/**
 * Get number of files in a directory
 * @return  int
 */
function get_dir_file_count($dirpath)
{
	$filecount = 0;
	$files = glob($dirpath . "*");
	if ($files) {
		$filecount = count($files);
	}
	return $filecount;
}

/**
 * Format text by removing non letters characters with space.
 * @return  string
 */
function make_readable($string = '')
{
	if (!empty($string)) {
		$string = preg_replace("/[^a-zA-Z0-9]/", ' ', $string);
		$string = trim($string);
		$string = ucwords($string);
		$string = preg_replace('/\s+/', ' ', $string);
	}
	return $string;
}

/**
 * Print Out Full Address of a Link
 * @return null
 */
function print_link($link = "")
{
	
	//check if is a valid Link
	if (filter_var($link, FILTER_VALIDATE_URL) !== FALSE) {
		echo $link;
	} elseif(stripos($link, "tel:") === 0){ //check if link is telephone link
		echo  $link;
	}
	else{ //link must be a path.
		echo SITE_ADDR . $link;
	}
}
/**
 * Print out language translation of the default language
 * @return string
 */
function print_lang($name)
{
	global $lang;
	$phrase = $lang->get_phrase($name);
	if (!empty($phrase)) {
		echo $phrase;
	} else {
		echo $name;
	}
}

/**
 * Return language translation of the default language
 * @return string
 */
function get_lang($name)
{
	global $lang;
	$phrase = $lang->get_phrase($name);
	if (!empty($phrase)) {
		return $phrase;
	}
	return $name;
}


/**
 * Get The Current Url Address of The Application Server
 * @example http://mysitename.com
 * @return  string
 */
function get_url()
{
	$url  = isset($_SERVER['HTTPS']) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
	$url .= '://' . $_SERVER['SERVER_NAME'];
	$url .= in_array($_SERVER['SERVER_PORT'], array('80', '443')) ? '' : ':' . $_SERVER['SERVER_PORT'];
	$url .= $_SERVER['REQUEST_URI'];
	return $url;
}

/**
 * Construct New Url With Current Url Or  New Query String and Path
 * @param $newqs Array of New Query String Key Values
 * @param $pagepath String
 * @return  string
 */
function set_page_link($pagepath = null, $newqs = array())
{
	$get =  filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
	unset($get['request_uri']);
	$allget = array_merge($get, $newqs);
	$qs = null;
	if(!empty($allget)){
		$qs = http_build_query($allget);
	}
	if (empty($pagepath)) {
		return Router::$page_url . (!empty($qs) ? "?$qs" : null);
	}
	return "$pagepath"  . (!empty($qs) ? "?$qs" : null);
}

/**
 * Construct New Url With Current Url Or  New Query String
 * @param $newqs Array of New Query String Key Values
 * @param $replace String
 * @return  string
 */
function set_current_page_link($newqs = array(), $replace = false)
{
	$allqet = $newqs;
	if ($replace == false) {
		$get =  filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
		unset($get['request_uri']);
		$allqet = array_merge($get, $newqs);
	}
	$qs = null;
	if(!empty($allqet)){
		$qs = http_build_query($allqet);
	}
	return Router::$page_url . (!empty($qs) ? "?$qs" : null);
}

/**
 * Get Full Relative Path of The Current Page With Query String
 * @return  string
 */
function get_current_url()
{
	$get =  filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
	unset($get['request_uri']);
	$qs = null;
	if(!empty($get)){
		$qs = http_build_query($get);
	}
	return Router::$page_url . (!empty($qs) ? "?$qs" : null);
}


/**
 * Set Msg that Will be Display to User in a Session. 
 * Can Be Displayed on Any View.
 * @return  object
 */
function set_flash_msg($msg, $type = "success", $dismissable = true, $showduration = 5000)
{
	if ($msg !== '') {
		$class = null;
		$closeBtn = null;
		if ($type != 'custom') {
			$class = "alert alert-$type";
			if ($dismissable == true) {
				$class .= " alert-dismissable";
				$closeBtn = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			}
		}

		$msg = '<div data-show-duration="' . $showduration . '" id="flashmsgholder" class="' . $class . ' animated bounce">
						' . $closeBtn . '
						' . $msg . '
				</div>';

		set_session("MsgFlash", $msg);
	}
}

/**
 * Display The Message Set In MsgFlash Session On Any Page
 * Will Clear The Message Afterwards
 * @return  null
 */
function show_flash_msg()
{
	$f = get_session("MsgFlash");
	if (!empty($f)) {
		echo $f;
		clear_session("MsgFlash");
	}
}

/**
 * Check if current browser platform is a mobile browser
 * Can Be Used to Switch Layouts and Views on A Mobile Platform
 * @return  object
 */
function is_mobile()
{
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function is_ajax()
{
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

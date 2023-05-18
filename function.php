<?php
function getServerURL()
{
    $serverName = $_SERVER['SERVER_NAME'];
    $filePath = $_SERVER['REQUEST_URI'];
    $withInstall = substr($filePath,0,strrpos($filePath,'/')+1);
    $serverPath = $serverName.$withInstall;
    $applicationPath = $serverPath;
    if(strpos($applicationPath,'http://www.')===false)
    {
        if(strpos($applicationPath,'www.')===false)
            $applicationPath = 'www.'.$applicationPath;
        if(strpos($applicationPath,'http://')===false)
            $applicationPath = 'http://'.$applicationPath;
    }
    $applicationPath = str_replace("www.","",$applicationPath);
    return $applicationPath;
}
function DBout($string){
	$string = stripslashes(trim($string));
	return str_replace("&#039;","'",html_entity_decode($string,ENT_QUOTES,'UTF-8'));
}

function DBin($string){
	$a = html_entity_decode($string);
	return trim(htmlspecialchars($a,ENT_QUOTES));
}
function Email_To_Admin($subject,$from,$msg,$FullName){
        $headers = "";
        $to = "11brohi@gmail.com";
     $domain = trim($_SERVER['SERVER_NAME'],"www.");
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     $headers .= 'To: <'.$to.'>'. "\r\n";
     $headers .= 'From: '.$FullName.'<'.$from.'>' . "\r\n"; 
     return @mail($to, $subject, $msg, $headers);
}
function base64_images_to_save($data){
    if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
        $data = substr($data, strpos($data, ',') + 1);
        $type = strtolower($type[1]); // jpg, png, gif
    
        if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png','svg','webp' ])) {
            throw new \Exception('invalid image type');
        } 
        $data = str_replace( ' ', '+', $data );
        $data = base64_decode($data);
    
        if ($data === false) {
            throw new \Exception('base64_decode failed');
        }
    } else {
        throw new \Exception('did not match data URI with image data');
    } 
    $file_name = rand(1,9999).time()."_".rand(9999,9999999)."_img.{$type}";
    file_put_contents("listing_images/".$file_name, $data);
    return $file_name;
}
function pagnination_btns($page_no,$previous_page,$total_no_of_pages,$next_page){
?>
 <nav aria-label="Page navigation example">
    <ul class="pagination">
    <?php if($page_no > 1){
    echo "<li class='page-item'><a class='page-link' href='?page_no=1'>First Page</a></li>";
    } ?>
        
    <li <?php if($page_no <= 1){ echo "class='disabled page-item'"; } ?>>
    <a class='page-link' <?php if($page_no > 1){
    echo "href='?page_no=$previous_page'";
    } ?>>Previous</a>
    </li>
    <?php
    if ($total_no_of_pages <= 10){  	 
    	for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
    	if ($counter == $page_no) {
    	echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
    	        }else{
            echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                    }
            }
    }
    ?>
    <li <?php if($page_no >= $total_no_of_pages){
    echo "class='disabled page-item'";
    } ?>>
    <a class='page-link' <?php if($page_no < $total_no_of_pages) {
    echo "href='?page_no=$next_page'";
    } ?>>Next</a>
    </li>
    
    <?php if($page_no < $total_no_of_pages){
    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    } ?>
    </ul>
 </nav>
<?php
}
function get_userDetail($con,$user_id){
    $select = "select f_name,l_name,user_email from users where id='".mysqli_real_escape_string($con,$user_id)."'";
    $q_run = mysqli_query($con,$select) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($q_run);
    return $data;
}
?>

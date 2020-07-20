<?php
//excersize 2
// Question No - 2
//telnet to the server, create n number files (accept input from user),zips all the files created and then download the files and extract the files

// Answer 

// load zip archieve library in php

//reference to telnet_to_server files
$zip = new ZipArchive;
$fileNamePath = '/file.txt';
$filezipName = 'newname.txt';
    if ($zip->open(getcwd() . '/test.zip', ZipArchive::CREATE) === TRUE) {
        $zip->addFile(getcwd() . $fileName, 'newname.txt');
        $zip->close();
        echo 'ok';
    } else {
        echo 'failed';
}

//download folder files in php

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"".$filename."\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filepath.$filename));
ob_end_flush();
@readfile($filepath.$filename);
$zipPath = '';
$handle = fopen($zipPath, "rb");
    while (!feof($handle)){
        echo fread($handle, 8192);
    }
    fclose($handle);
   
    
//Question 3 
// auto restart apache server in case if there is too much load on apache
    
//Answer 
    
//write sell script 

for I in 0 1 2 3 4 5; do
    check=$(uptime | tr -d ',.' | awk '{print $10}')
    if [ "$check" -gt 5 ]; then
        /usr/bin/systemctl restart httpd.service
    fi
    sleep 10
done
            

//set cronjob 
            
* * * *  /PATH/TO/YOUR/SCRIPT
            
            
//Question 4
            
 //4 
 
anser - use TOP command all activity for server 
    like 
    
    top-m – sort task list by memory usage
 top-p – sort task list by processor usage
 top-n – sort task list by process ID
top-t – sort task list by run time
    
  command - mpstat for CPU activity  
            
 

?>

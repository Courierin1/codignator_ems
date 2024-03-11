<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('fileuploadCI')){
    function fileuploadCI($filename,$path,$newname){
        $image=$_FILES[$filename]['name'];
		ini_set('upload_max_filesize', '10G');
		ini_set('post_max_size', '10G');
		ini_set('max_input_time', 3000);
		ini_set('max_execution_time', 3000);

		$CI =& get_instance();
		$config=array(
			'upload_path' => $path,
			'allowed_types' => '*',
			'overwrite' => TRUE,
        	'max_size' => "2048000",
			'file_name'=>$newname
		);
		$CI->load->library('upload',$config);
		$CI->upload->initialize($config);
		if ($CI->upload->do_upload($filename)) {
			return '1';
		} else {
			return 'Not Uploaded';
		}
    }
}
?>

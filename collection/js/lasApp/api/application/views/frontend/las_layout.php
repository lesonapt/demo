<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="<?php if(isset($meta)){echo $meta;}else{ echo 'lesonapt,las, le anh son';} ?>" />
	<meta name="description" content="<?php $meta = $this-> session->userdata('sys_meta');echo $meta; ?>" />
	<meta content="INDEX,FOLLOW" name="robots" />
	<meta content="INDEX,FOLLOW" name="goolgebot" />
	<meta name="revisit-after" content="1 days" />
	<title><?php if(isset($title)){echo $title;}else{echo 'title page';}?></title>


    <link rel="stylesheet" media="all" href="<?php echo base_url('style/css/bootstrap.min.css') ?>"/>
	<link rel="stylesheet" media="all" href="<?php echo base_url('style/css/bootstrap-theme.min.css') ?>"/>
	<script src="<?php echo base_url('style/js/bootstrap.min.js')?>"></script>
	<!-- skin -->
	<?php if(isset($css)):?>
		<link rel="stylesheet" type="text/css" href="<?php echo  base_url('style/css/'.$css)?>" />
	<?php endif;?>
	<?php if(isset($js)):?>
		<script src="<?php echo base_url('style/js/'.$js)?>"></script>
	<?php endif;?>


</head>	
<body >
    <div class="container">
    <div class="row"><div class="col-md-12">Header</div></div>
    <div class="row">
        <?php echo $_contents;?>
    </div>
    <div class="row"><div class="col-md-12">&copy 2013 by lesonapt</div></div>
	 
    </div>
</body>
</html>




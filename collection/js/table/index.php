<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico" />
		
		<title>DataTables example</title>
        <link href="jquery.dataTables.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" language="javascript" src="jquery-1.10.2.min.js"></script>
		<script type="text/javascript" language="javascript" src="jquery.dataTables.nightly.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sScrollY": "200px",
					"bPaginate": false,
					"bScrollCollapse": true
				} );
                
                $('#example_filter').hide();
			} );
		</script>
	</head>
	<body >
	
            
        <div id="demo" style="width: 1000px; margin: auto;">
            <table class="display" id="example">
            	<thead>
            		<tr>
            			<th>Rendering engine</th>
            			<th>Browser</th>
            			<th>Platform(s)</th>
            			<th>Engine version</th>
            			<th>12</th>
                        <th>3</th>
                        <th>df</th>
                        <th>g</th>
            		</tr>
            	</thead>
            	<tbody>
                    <?php for($i=0; $i< 40; $i++): ?>
            		<tr>
            			<td style="width: 200px;">Trident</td>
            			<td>Internet Explorer 4.0</td>
            			<td>Win 95+</td>
            			<td>4</td>
            			<td >X</td>
                        <td>Win 95+</td>
            			<td>4</td>
            			<td >X</td>
            		</tr>
            		<?php endfor; ?>
            	</tbody>
            </table>
        </div>
				
	</body>
</html>
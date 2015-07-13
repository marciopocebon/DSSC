<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Populate jQuery datatable with JSON data :: jQuery Ajax PHP</title>
<link rel="stylesheet" href="<?php echo base_url()?>bootstrap/plugins/datatables/dataTables.bootstrap.css" />
<link rel="stylesheet" href="<?php echo base_url()?>bootstrap/bootstrap/css/bootstrap.min.css" />
<!--<link rel="stylesheet" href="http://getbootstrap.com/assets/css/docs.css" />-->

<script src="<?php echo base_url();?>bootstrap/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>bootstrap/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	//$('#jsontable').dataTable( {
   //     "ajax": 'arrays.txt'
   // } );

var oTable = $('#jsontable').dataTable();  //Initialize the datatable
	$('#load').on('click',function(){
		var user = $(this).attr('id');
		if(user != '') 
		{ 
		$.ajax({
			url: '<?= site_url('welcome/ifsets'); ?>',
			dataType: 'json',
			success: function(s){
			console.log(s);
					oTable.fnClearTable();
					 	for(var i = 0; i < s.length; i++) {
                         oTable.fnAddData([
                                    s[i][0],
									s[i][1],
									s[i][2],
							        "<button>cl</button><button type='button' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#conn'>change password</button> "
                                      	   ]);
										} // End For
										
			},
			error: function(e){
			   console.log(e.responseText);	
			}
			});
		}
	});


	$('#jsontable tbody').on( 'click', 'button', function () {
		//var data = table.row( $(this).parents('tr') ).data();
		alert( "works" );
	} );
	
	$('#cl').on( 'click', function (e) {

		alert( "works" );
	} );
	
	
});
</script>


</head>

<body>
<div id="demo-header"></div>
<div class="container">
<input type="button" class="btn btn-primary" value="Load Table" id="load"/>
<table id="jsontable" class="display table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>            
                <th>Email</th>
            </tr>
        </thead>
		<tbody>
		</tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email</th>
            </tr>
        </tfoot>
    </table>
</div>



<a href="#conn" data-toggle="modal" >clik me se this</a>
<button id="left">click</button> <button id="right">&raquo;</button>
<div class="model fade" id="conn">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<p>Enter data here</p>
			</div>
			<div class="modal-body">
				<input type="text" class="inline" name="intext"/>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>


</body>
</html>

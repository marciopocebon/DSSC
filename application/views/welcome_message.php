<link href="../dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Optional Bootstrap Theme -->

<link href="data:text/css;charset=utf-8," data-href="../dist/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet">



<!-- Documentation extras -->

<link href="../assets/css/docs.min.css" rel="stylesheet">

<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="../assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Favicons -->
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="icon" href="/favicon.ico">
<div class="content" style="display:none">
<form name="<?php base_url('index.php/welcome/ifsets')  ?>" method="post">

<table class="table table-hover" id="table">
	<thead>
	<tr>
		<th>Index No</th>
		<th width="300">Student Name</th>
		<th>Subject</th>
		<th>Term</th>
		<th>Marks</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<?php foreach ($results as $result): ?>
	<tr>
		<td><?= $result['Index_No']; ?>
		</td>
		<td><?= $result['name']; ?>
		<td><input type="text" name="txtMarks" class="yourtext" ></td>
		<td>
			<?php echo	"<a href=" .base_url('index.php/welcome/ifsets') . "><i
					class='btn btn-xs btn-warning'>Edit</i> </a></td>" ?>
		<td><button value="will it" id="btn">will it</button></td>
		<td><input type="button" name="OK" class="ok" value="OK"/></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>

</form>

<p id="demo"></p>
</br>
</br>

<!--<script src="--><?//=base_url('js/jquery.js'); ?><!--"></script>-->
<!--<script src="--><?//=base_url('js/jquery.json-2.4.min.js');?><!--"></script>-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>


		$('.ok').on('click', function (e) {
			var parentRow = $(this).parents('tr')[0];
			var TableData;
			TableData={
				"IndexNo" : $('td:eq(0)',parentRow).html()
				, "Marks" :$('input[name="txtMarks"]', parentRow).val()
			};
//			var overtime =$('input[name="txtMarks"]', parentRow).val()
			sendTblDataToServer(TableData);
			e.preventDefault();
			$(this).parent().parent().hide(1100);
		});



	function sendTblDataToServer(dats)
		{
			var TableData = JSON.stringify(dats);
			document.getElementById("demo").innerHTML = TableData;
			$('#tbSendTblDataToServer').val('JSON array to send to server: \n\n' + TableData.replace(/},/g, "},\n"));

			$.ajax({
				type: "POST",
				url: "<?=site_url('welcome/ifsets'); ?>",
				data: "pTableData=" + TableData,
				success: function (data) {
					//alert('This was sent back: ' + data);
				}
			});

		}

</script>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div><!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
</div>

<script>
//	$(document).ready(function()
//	{
//		$("p").click(function(){
//			$(this).hide(1200);
//		});
//
//		$(".btu").on('click', function() {
//			alert("Button worked");
//		});
//	});

	$(document).ready(function() {
		$('.content').fadeIn(400);
	});
</script>



<body>
<p>This how disapear things</p>
<input type="button" name="btu" id="btu" class="btu" value="Try this">
</body>

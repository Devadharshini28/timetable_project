<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN</title>
<link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
<link href="dist/jquery.bootgrid.css" rel="stylesheet" />
<script src="dist/jquery-1.11.1.min.js"></script>
<script src="dist/bootstrap.min.js"></script>
<script src="dist/jquery.bootgrid.min.js"></script>
</head>
<body>
	<div class="container">
      <div class="">
        <h1>SUBJECTS_TAKEN</h1>
        <div class="col-sm-8">
		<div class="well clearfix">
			<div class="pull-right"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Record</button></div></div>
		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
			<thead>
				<tr>
					<th data-column-id="Row_id" data-type="numeric" data-identifier="true">Row_id</th>
					<th data-column-id="Course_code">Course_code</th>
					<th data-column-id="F_id">F_id</th>
					<th data-column-id="Course_name">Course_name</th>
					<th data-column-id="No_of_times">No_of_times</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Options</th>
				</tr>
			</thead>
		</table>
    </div>
      </div>
    </div>
	
<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add SUBJECTS_TAKEN</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
				<input type="hidden" value="add" name="action" id="action">
                  <div class="form-group">
                    <label for="name" class="control-label">Course_code:</label>
                    <input type="text" class="form-control" id="Course_code" name="Course_code"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">F_id:</label>
                    <input type="text" class="form-control" id="F_id" name="F_id"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">Course_name:</label>
                    <input type="text" class="form-control" id="Course_name" name="Course_name"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">No_of_times:</label>
                    <input type="text" class="form-control" id="No_of_times" name="No_of_times"/>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_add" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit SUBJECTS_TAKEN</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit">
				<input type="hidden" value="edit" name="action" id="action">
				<input type="hidden" value="0" name="edit_Row_id" id="edit_Row_id">
                  <div class="form-group">
                    <label for="name" class="control-label">Course_code:</label>
                    <input type="text" class="form-control" id="edit_Course_code" name="edit_Course_code"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">F_id:</label>
                    <input type="text" class="form-control" id="edit_F_id" name="edit_F_id"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">Course_name:</label>
                    <input type="text" class="form-control" id="edit_Course_name" name="edit_Course_name"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">No_of_times:</label>
                    <input type="text" class="form-control" id="edit_No_of_times" name="edit_No_of_times"/>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_edit" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
$( document ).ready(function() {
	var grid = $("#employee_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "response2.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.Row_id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " + 
		                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.Row_id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {
        //alert("You pressed edit on row: " + $(this).data("row-id"));
			var ele =$(this).parent();
			var g_Row_id = $(this).parent().siblings(':first').html();
            var g_Course_code = $(this).parent().siblings(':nth-of-type(2)').html();
console.log(g_Row_id);
                    console.log(g_Course_code);

		//console.log(grid.data());//
		$('#edit_model').modal('show');
					if($(this).data("row-id") >0) {
							
                                // collect the data
                                $('#edit_Row_id').val(ele.siblings(':first').html()); // in case we're changing the key
                                $('#edit_Course_code').val(ele.siblings(':nth-of-type(2)').html());
                                $('#edit_F_id').val(ele.siblings(':nth-of-type(3)').html());
                                $('#edit_Course_name').val(ele.siblings(':nth-of-type(4)').html());
								$('#edit_No_of_times').val(ele.siblings(':nth-of-type(5)').html());
					} else {
					 alert('Now row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {
	
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
					alert(conf);
                    if(conf){
                                $.post('response2.php', { id: $(this).data("row-id"), action:'delete'}
                                    , function(){
                                        // when ajax returns (callback), 
										$("#employee_grid").bootgrid('reload');
                                }); 
								$(this).parent('tr').remove();
								$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                    }
    });
});

function ajaxAction(action) {
				data = $("#frm_"+action).serializeArray();
				$.ajax({
				  type: "POST",  
				  url: "response2.php",  
				  data: data,
				  dataType: "json",       
				  success: function(response)  
				  {
					$('#'+action+'_model').modal('hide');
					$("#employee_grid").bootgrid('reload');
				  }   
				});
			}
			
			$( "#command-add" ).click(function() {
			  $('#add_model').modal('show');
			});
			$( "#btn_add" ).click(function() {
			  ajaxAction('add');
			});
			$( "#btn_edit" ).click(function() {
			  ajaxAction('edit');
			});
});
</script>

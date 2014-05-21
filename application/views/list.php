<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ToDo List</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div id="container" class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1>ToDo List:</h1>

			<a href="todo/create"><button type="submit" class="btn btn-success btn-xs">Create New Item</button></a>
		</div>
	</div>
	<div id="body" class="row">
		<div class="row">
			<div class="col-xs-11 col-xs-offset-1">
				<h3>Items:</h3>
			</div>
		</div>
		<table class="table">
				<?php foreach ($todos as $key => $todo):?>
			<tr><td>
				<div class="col-xs-11 col-xs-offset-1">
					<div class="pull-left" style="padding:1px;">
					<?php if ($todo->dateCompleted):?>
							<del><?php echo $todo->text;?></del>
					<?php else:?>
							<form action="todo/complete" method="post">
									<input type="hidden" id="todo_id" name="todo_id" value="<?php echo $todo->id;?>" />
									<button type="submit" class="btn btn-success btn-xs" title="Complete"><span class="glyphicon glyphicon-ok"></span></button>
							</form>
					</div>
					<div class="pull-left" style="padding:2px;">
							<?php echo $todo->text;?>
					</div>
					<div class="pull-left" style="padding:1px;">
							<form action="todo/edit" method="get">
									<input type="hidden" id="todo_id" name="todo_id" value="<?php echo $todo->id;?>" />
									<button type="submit" class="btn btn-info btn-xs" title="Edit"><span class="glyphicon glyphicon-pencil"></span></button>
							</form>  
					<?php endif;?>
					</div>
					<div class="pull-left" style="padding:1px;">
						<form action="todo/delete" method="post">
								<input type="hidden" id="todo_id" name="todo_id" value="<?php echo $todo->id;?>" />
	    						<button type="submit" class="btn btn-danger btn-xs"  title="Delete permanently"><span class="glyphicon glyphicon-trash"></span></button>
						</form>
					</div>
				</div>
			</td></tr>
				<?php endforeach;?>
		</table>
	</div>

</div>

</body>
</html>
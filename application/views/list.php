<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ToDo List</title>
</head>
<body>

<div id="container">
	<h1>ToDo List:</h1>

	<a href="home/create">Create New Item</a>

	<div id="body">
		<h3>Items:</h3>
		<ul>
			<?php foreach ($todos as $key => $todo):?>
				<li><?php echo $todo->text;?> 
					<form action="home/edit" method="get">
							<input type="hidden" id="todo_id" name="todo_id" value="<?php echo $todo->id;?>" />
    						<button type="submit">Edit</button>
					</form>  
					<form action="home/complete?id=<?php echo $todo->id;?>">
    						<button type="submit">Complete</button>
					</form> 
					<form action="home/delete?id=<?php echo $todo->id;?>">
    						<button type="submit">Delete</button>
					</form>
				</li>
			<?php endforeach;?>
		</ul>
	</div>

</div>

</body>
</html>
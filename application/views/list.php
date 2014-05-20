<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ToDo List</title>
</head>
<body>

<div id="container">
	<h1>ToDo Items:</h1>

	<a href="home/create">Create New Item</a>

	<div id="body">
		<ul>
			<?php foreach ($todos as $key => $todo):?>
				<li><?php echo $todo->text;?></li>
			<?php endforeach;?>
		</ul>
	</div>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ToDo List - Create an Item</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div id="container" class="container">
    <div class="row">
        <div class="col-xs-12">
	       <h1>Create a new Item:</h1>
        </div>
    </div>

	<div id="body" class="row">
        <div class="col-xs-12">
            <form method="post" accept-charset="utf-8" action="" />
                <input type="text" name="todo_text" id="todo_text" value="" maxlength="250" size="50" placeholder="Enter some text"/>
                <button name="submit" type="submit" class="btn btn-success btn-xs">Create</button>
            </form>
        </div>
	</div>

</div>

</body>
</html>
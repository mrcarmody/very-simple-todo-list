<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ToDo List - Edit an Item</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div id="container" class="container">
    <div class="row">
        <div class="col-xs-12">
	       <h1>Edit Item:</h1>
        </div>
    </div>
	<div id="body" class="row">
        <div class="col-xs-12">
            <form method="post" accept-charset="utf-8" action="" />
                <input type="text" name="todo_text" id="todo_text" 
                        value="<?php echo $text;?>" 
                        maxlength="250" size="50" />
                <input type="hidden" id="todo_id" name="todo_id" value="<?php echo $id;?>" />
                <button name="submit" type="submit" class="btn btn-success btn-xs">Update</button>
            </form>
        </div>
	</div>

</div>

</body>
</html>
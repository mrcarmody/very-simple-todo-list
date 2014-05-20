<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ToDo List - Update an Item</title>
</head>
<body>

<div id="container">
	<h1>Update an Item:</h1>

    <!-- <a href="/home">Back</a> -->
    
    <br/>
    <br/>

	<div id="body">
        <form method="post" accept-charset="utf-8" action="" />
            <input type="text" name="todo_text" id="todo_text" 
                    value="<?php echo $text;?>" 
                    maxlength="250" size="50" />
            <input type="hidden" id="todo_id" name="todo_id" value="<?php echo $id;?>" />
            <button name="submit" type="submit">Update</button>
        </form>
	</div>

</div>

</body>
</html>
<?php

require_once 'autoload.php';

use Core\Db;
use Core\File;

/* example test insert data */

  /*  $data = [
            'title' => 'updated',
            'desc' => 'updated'
            ];*/
/*
$test = Db::getInstance();
$test->table("posts")->insert($data)->save();*/



/* example test delete data */

/*$test = Db::getInstance();
$data =$test->table('posts')->delete()->where('id','=',39)->save();*/


/* example update data */

/*$test = Db::getInstance();
$test = $test->table('posts')->update($data)->where('id','=',41)->save();*/

?>

<?php

/* example upload file */

if (isset($_POST['submit'])){

    $file =  $_FILES['image'];
    $test = new File($file);
    $test->rename()->upload('posts');
}


?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Medical Services</title>
</head>
<body>

<div class="container">
    <div class="row">

        <form class="border p-5 my-3 " style="background-color:#4A5055;" method="POST" action=""
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="image" class="text-white">Your Name </label>
                <input type="file" name="image" class="form-control" id="image">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

    </div>

</div>
</div>


</body>
</html>




















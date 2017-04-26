<?php
//phpinfo();

if(isset($_FILES['file'])){
    $uploads_dir = '/uploads';
    $tmp_name = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
}

?>
<html>
    <body>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="file"/><br/>
            <input type="submit" value="upload" name="submit"/>
        </form>
    </body>
</html>



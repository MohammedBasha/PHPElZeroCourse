<?php
echo '<pre>';
var_dump($_GET, $_POST, $_REQUEST);
echo '</pre>';

?>
<html>
    <head>
        <title>Test Super Global Variable _REQUEST</title>
    </head>
    <body>
        <form action="" method="post" enctype="application/x-www-form-urlencoded">
            <input type="text" name="username">
            <input type="submit" name="submit" value="press here">
        </form>
    </body>
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>Upload</title>
    </head>
    <body>
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="text" name="ten">
            <input type="file" accept="image/*" value="<?=set_value('image');?>" name="image"  class="form-control" >
            <button type="submit">Gui</buton>
        </form>
    </body>
</html>

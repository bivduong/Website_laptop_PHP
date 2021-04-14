<?php

include 'inc/header.php';
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <style>
    #panorama {
        width: 400px;
        height: 400px;
    }

</style>
<div id="panorama"></div>
<?php 
include 'inc/footer.php';
$product_show=$product->show_shop();
if($product_show){
  while($result=$product_show->fetch_assoc()){
?>

<script>
pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "admin/upload/<?php echo $result['image']?>",
    "autoLoad": true
});
</script>
<?php
}}
?>

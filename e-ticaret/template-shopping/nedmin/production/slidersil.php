
 <input type="hidden" name="eski_slider" value="<?php echo $slidercek['slider_resimyol']; ?>">
<?php
 $slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");
 $slidersor->execute(array(
  'id' => $_GET['slider_id']));
 $slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);
header("location:../netting/islem.php?slider_id=<?php echo$slidercek['slider_id'] ?>&slidersil=ok")

 ?>

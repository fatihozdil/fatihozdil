<?php include"header.php";?>


	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						
						<div class="col-md-4">
							
							<div class="bigtitle">hakkımızda</div>
						</div>
					
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
					<div class="title-bg">
					<div class="title">tanıtım videosu</div>
					
				</div>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video'];?>" frameborder="0"  allowfullscreen></iframe>
				<div class="title-bg">
					<div class="title">vizyon</div>
						
				</div>
				<blockquote><?php echo $hakkimizdacek['hakkimizda_vizyon'];?></blockquote>
				<div class="title-bg">
					<div class="title">misyon</div>
					
				</div>
				<blockquote><?php echo  $hakkimizdacek['hakkimizda_misyon'];?></blockquote>
				<div class="title-bg">
					<div class="title">hakkımızda</div>
				</div>
			
				
				<div class="page-content">
					<?php echo $hakkimizdacek["hakkimizda_icerik"];?>
				</div>
			</div>
			<!-- sidebar include -->
			<?php include"sidebar.php";?>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include"footer.php"; ?>
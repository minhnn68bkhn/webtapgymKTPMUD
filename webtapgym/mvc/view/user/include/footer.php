<section class="section-footer">
		<div class="container">
			<div class="footer">
				<div class="soci">
					<h4>Liên hệ hổ trợ kỹ thuật luyện tập</h4>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>
				<div class="soci">
					<h4> Liên hệ tư vấn </h4>
					<ul>
						<li><a href="#"><i class="fas fa-phone-alt">&nbsp;0123456789</i></a></li>
					</ul>
				</div>
			</div>
	
		</div>
	</section>
	<section class="end">
		<div class="container">
			<div class="end-page">
				<a href="#">@NocopyRight website Gym designer by me</a>
			</div>
		</div>
	</section>
	<!-- end footer -->

</body>
<script src="public/js/bootstrap.js"></script>
<script src="public/js/bootstrap.bundle.js"></script>
<script src="public/js/popper.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	$(document).ready(function(){
		var action = "search_name";
		$("#search_name").keyup(function(){
		var search_name = $("#search_name").val();

			if (search_name != "") {
				$.ajax({
					url:"home/search",
					method:"POST",
					data:{action:action,search_name:search_name},
					success:function(data){
						$("#search").html(data);
					}
				});
			}
			else{
				$("#search").html("");
			}

		});
		$("#search_name").keypress(function(){
		var search_name = $("#search_name").val();

			if (search_name != "") {
				$.ajax({
					url:"home/search",
					method:"POST",
					data:{action:action,search_name:search_name},
					success:function(data){
						$("#search").html(data);
					}
				});
			}
			else{
				$("#search").html("");
			}

		});
	});	
</script>

</html>
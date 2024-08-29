<?php
include "navabar.php";
?>

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Categories</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Accueille</a>
						</li>
					</ul>
				</div>
				<a href="ajout_Catge.php" class="btn-download">
					<i class='fas fa-plus' ></i>
					<span class="text">Ajouter</span>
				</a>
			</div>
			<div class="body mb-5">
				<div class="containerBod">
					<div class="grid grid-cols-4 gap-3">
						<div class="col">
							<div class="card p-2 rounded relative transition origin-bottom-right hover:rotate-45">
								<div class="square flex">
									<div class="nbr">
										<h4 class="text-gray-500 bg-gray-700 rounded font-bold absolute end-0 top-0 px-2 text-white " >50</h4>
									</div>
									<div class="inline-flex items-center ">
										<i class="fas fa-laptop text-6xl bg-blue-200 p-2 rounded-lg text-blue-500" ></i>
									</div>
									<div class="block px-3">
										<p class="text-gray-700 font-bold text-2xl underline underline-offset-8 " >Acer</p>
										<p class="text-gray-700 italic " >RAM 4GB, Processeur 4hz, Bat: 3mAh</p>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>
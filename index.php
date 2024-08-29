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
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<a class="active" href="#">Accueille</a>
				</li>
			</ul>
		</div>
		<a href="ajout_Catge.php" class="btn-download">
			<i class='fas fa-plus'></i>
			<span class="text">Ajouter</span>
		</a>
	</div><br><br>
	<div class="body">
		<div class="containerBod">
			<div class="grid grid-cols-4 gap-3">
				<?php $affCateg = AfficheCategorie($db);
				foreach ($affCateg as $categories) {  ?>
					<div class="col">
						<div class="card p-2 rounded relative transition origin-bottom-right hover:rotate-45">
							<div class="square flex">
								<div class="nbr">
									<h4 class="text-gray-500 bg-gray-500 rounded font-bold absolute end-0 top-0 px-2 text-white ">50</h4>
								</div>
								<div class="inline-flex items-center ">
									<i class="fas fa-laptop text-6xl bg-blue-200 p-2 rounded-lg text-blue-500"></i>
								</div>
								<div class="block px-3 mb-2">
									<p class="block text-gray-700 font-bold text-2xl underline underline-offset-8 "><?php echo $categories->nom_categorie    ?></p>
									<p class="text-gray-700 italic "><?php echo $categories->Description    ?></p>
								</div><br><br>
								<div class="action absolute bottom-0 end-0 p-2">
									<span>
										<a href="ajout_Catge.php?action=edit&categories=<?php echo $categories->id_categorie ?>"  class="btn m-0 p-0"><i class="fas fa-pen text-blue-500" ></i></a>
										<a href="suppresion.php?action=delete&categories=<?php echo $categories->id_categorie ?>"  class="btn m-0 p-0"><i class="fas fa-trash-alt text-red-500" ></i></a>
										<a href=""  class="btn m-0 p-0"><i class="fas fa-eye text-yellow-500" ></i></a>
									</span>
								</div>
							</div>
						</div>
					</div>
				<?php }
				?>
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
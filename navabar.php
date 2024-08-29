<?php  
session_start();
include("connexion_db.php");
include("commande.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./STYLE/bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
    

	<title>PC TRADING</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">PC Trading</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#"> 
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="index.php" class="mx-3">
					<i class='fas fa-clone mx-1' ></i>
					<span class="text">Cathegorie</span>
				</a>
			</li>
			<li>
				<a class="mx-3" href="produit.php">
					<i class='fas fa-laptop mx-1' ></i>
					<span class="text">Produits</span>
				</a>
			</li>
			<li>
				<a class="mx-3" href="vente.php">
					<i class='fas fa-wheelchair mx-1' ></i>
					<span class="text">Vente</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a class="mx-3" href="#">
					<i class='fas fa-id-badge mx-1' ></i>
					<span class="text">Identifiant</span>
				</a>
			</li>
			<li>
				<a href="#" class="mx-3">
					<i class='fas fa-power-off mx-1' ></i> 
					<span class="text">Deconexion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class="fas fa-search" ></i></button>
				</div>
			</form>
			<p class="mb-2" >Admin</p>
		</nav>
		<!-- NAVBAR -->

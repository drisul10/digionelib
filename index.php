<?php
	if(isset($_GET['page'])){
		if ($_GET['t']=='f') {
			require "header_mahasiswa.php";
			switch ($_GET['page']) {
				case 'pustaka_buku':
					require 'frontend/pustaka_buku.php';
					break;
				case 'digital_library':
					require 'frontend/digital_library.php';
					break;
				case 'peminjaman':
					require 'frontend/peminjaman.php';
					break;
				case 'pengembalian':
					require 'frontend/pengembalian.php';
					break;
				case 'beranda':
					require 'frontend/beranda.php';
					break;
				default:
					require 'frontend/beranda.php';
					break;
			}	
			require "footer_mahasiswa.php";
		}else{
			require "header.php";
			switch ($_GET['page']) {
				case 'peminjaman':
					require 'backend/peminjaman.php';
					break;
				case 'pengembalian':
					require 'backend/pengembalian.php';
					break;
				case 'denda':
					require 'backend/denda.php';
					break;
				default:
					require 'beranda.php';
					break;
			}	
			require "footer.php";
		}
		
	}else {
		header('Location: '.$base_url.'login/login.php');
	}
	// require "footer.php";
?>
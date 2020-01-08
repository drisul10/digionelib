<?php
    include "database.php";
    $db= new database();
    if ($_GET) {
        switch ($_GET['get']) {
            case 'getDataPustakaBuku':
                echo json_encode($db->getDataPustakaBuku());
                break;
            case 'getMahasiswa':
                echo json_encode($db->getMahasiswa());
                break;
            case 'getDataPeminjaman':
                echo json_encode($db->getDataPeminjaman());
                break;
            case 'getDataPengembalian':
                echo json_encode($db->getDataPengembalian());
                break;
            case 'getDetailPeminjaman':
                echo json_encode($db->getDetailPeminjaman($_GET['id']));
                break;
            case 'getDetailPeminjamanUser':
                echo json_encode($db->getDetailPeminjamanUser($_GET['id']));
                break;
            case 'getDetailPengembalianUser':
                echo json_encode($db->getDetailPengembalianUser($_GET['id']));
                break;
            case 'getDetailDigitalLibrary':
                echo json_encode($db->getDetailDigitalLibrary($_GET['id']));
                break;
            case 'getDetailPustakaBuku':
                echo json_encode($db->getDetailPustakaBuku($_GET['id']));
                break;
            case 'getDenda':
                echo json_encode($db->getDenda());
                break;
            default:
                # code...
                break;
        }
    }elseif($_POST){
        switch ($_POST['action']) {
            case 'tambah_peminjaman':
                $hasil=$db->tambahPeminjaman($_POST);
                if ($hasil) {
                    echo "Sukses";
                }else{
                    echo "Gagal";
                }
                break;
            case 'simpanPengembalian':
                $hasil=$db->simpanPengembalian($_POST);
                if ($hasil) {
                    echo "Sukses";
                }else{
                    echo "Gagal";
                }
                break;
            case 'simpanDenda':
                $hasil=$db->simpanDenda($_POST);
                if ($hasil) {
                    echo "Sukses";
                }else{
                    echo "Gagal";
                }
                break;
            default:
                # code...
                break;
        }
    }
?>
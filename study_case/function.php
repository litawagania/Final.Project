<?php
$conn = mysqli_connect("localhost", "root", "", "finalproject");

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = $data["password"]; // Store password before escaping
    $password2 = $data["password2"];
    $role = $data["role"];

    // Hash password before escaping
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check for potential errors with password_hash
    if ($hashed_password === false) {
        // Handle error (e.g., log it or display a generic error message)
        return false;
    }

    $password = mysqli_real_escape_string($conn, $hashed_password); // Escape the hashed password

    // Use a prepared statement for the INSERT query
    if ($stmt = $conn->prepare('INSERT INTO data_user (username, password, role) VALUES (?, ?, ?)')) {
        $stmt->bind_param('sss', $username, $password, $role);
        $stmt->execute();
        $stmt->close();
        return mysqli_affected_rows($conn);
    } else {
        // Handle statement preparation error
        return false;
    }
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
}
    return $rows;
}

function tambah($barang) {
    global $conn;
    
    $id_barang = htmlspecialchars($barang["id_barang"]);
    $nama = htmlspecialchars($barang["nama_barang"]);
    $jumlah = htmlspecialchars($barang["jumlah"]);
    $satuan = htmlspecialchars($barang["satuan"]);
    $status = 'Pending';
    
    $insert = "INSERT INTO barang (id_barang, nama_barang, jumlah, satuan, Status) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$status')";

    $query_result = mysqli_query($conn, $insert);

    if ($query_result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1;
    }
}

function tambahrfq($rfq) {
    global $conn;
    
    $id_barang = htmlspecialchars($rfq["id_barang"]);
    $nama = htmlspecialchars($rfq["nama_barang"]);
    $jumlah = htmlspecialchars($rfq["jumlah"]);
    $satuan = htmlspecialchars($rfq["satuan"]);
    $date = htmlspecialchars($rfq["deadline"]);
    $harga = htmlspecialchars($rfq["harga"]);
    $status = 'Pending';
    
    $insert = "INSERT INTO rfq (id_barang, nama_barang, jumlah, satuan, deadline, harga, Status) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$date', '$harga', '$status')";

    $query_result = mysqli_query($conn, $insert);

    if ($query_result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1;
    }
}

function tambah2($barang) {
    global $conn;
    
    $id_barang = htmlspecialchars($barang["id_barang"]);
    $nama = htmlspecialchars($barang["nama_barang"]);
    $jumlah = htmlspecialchars($barang["jumlah"]);
    $satuan = htmlspecialchars($barang["satuan"]);
    $harga = htmlspecialchars($barang["harga"]);
    
    $insert = "INSERT INTO barang_vendor (id_barang, nama_barang, jumlah, satuan, harga) 
    VALUES('$id_barang', '$nama', '$jumlah', '$satuan', '$harga')";

    $query_result = mysqli_query($conn, $insert);

    if ($query_result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1;
    }
}

function hapus($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"DELETE FROM barang WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function hapus2($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"DELETE FROM barang_vendor WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function hapus3($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"DELETE FROM rfq WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function setujui($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE barang SET Status = 'Disetujui' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function setujui2($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE rfq SET Status = 'Diterima' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function Beli($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE barang_vendor SET Status = 'Dibeli' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function tolak($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE barang SET Status = 'Ditolak' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function tolak2($no) {
    global $conn;

    $safe_no = mysqli_real_escape_string($conn, $no);

    mysqli_query($conn,"UPDATE rfq SET Status = 'Ditolak' WHERE No = $safe_no");
    
    return mysqli_affected_rows($conn);
}

function ubah($barang){
    global $conn;

    $no = $barang["no"];
    $id_barang = htmlspecialchars($barang["id_barang"]);
    $nama = htmlspecialchars($barang["nama_barang"]);
    $jumlah = htmlspecialchars($barang["jumlah"]);
    $satuan = htmlspecialchars($barang["satuan"]);

    $query = "UPDATE barang SET 
    id_barang = '$id_barang', 
    nama_barang = '$nama', 
    jumlah = '$jumlah', 
    satuan = '$satuan' 
    WHERE No = $no";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubah2($vendor){
    global $conn;

    $no = $vendor["no"];
    $id_barang = htmlspecialchars($vendor["id_barang"]);
    $nama = htmlspecialchars($vendor["nama_barang"]);
    $jumlah = htmlspecialchars($vendor["jumlah"]);
    $satuan = htmlspecialchars($vendor["satuan"]);
    $harga = htmlspecialchars($vendor["harga"]);

    $query = "UPDATE barang_vendor SET 
    id_barang = '$id_barang', 
    nama_barang = '$nama', 
    jumlah = '$jumlah', 
    satuan = '$satuan',
    harga = '$harga' 
    WHERE No = $no";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah3($rfq){
    global $conn;

    $no = $rfq["no"];
    $id_barang = htmlspecialchars($rfq["id_barang"]);
    $nama = htmlspecialchars($rfq["nama_barang"]);
    $jumlah = htmlspecialchars($rfq["jumlah"]);
    $satuan = htmlspecialchars($rfq["satuan"]);
    $date = htmlspecialchars($rfq["deadline"]);
    $harga = htmlspecialchars($rfq["harga"]);

    $query = "UPDATE rfq SET 
    id_barang = '$id_barang', 
    nama_barang = '$nama', 
    jumlah = '$jumlah', 
    satuan = '$satuan',
    deadline = '$date',
    harga = '$harga' 
    WHERE No = $no";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
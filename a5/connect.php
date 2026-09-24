<?php
$servername = "sql202.infinityfree.com";
$username   = "if0_42582102";
$password   = "pptepzaz101";
$dbname     = "if0_42582102_test";
$fallback_db = "if0_42582102_work_shop";
$port       = 3306;

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    if (!empty($fallback_db)) {
        try {
            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$fallback_db;charset=utf8mb4", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbname = $fallback_db;
        } catch(PDOException $e2) {
            die("Connection failed: " . $e2->getMessage());
        }
    } else {
        die("Connection failed: " . $e->getMessage());
    }
}

if (basename($_SERVER['SCRIPT_FILENAME']) === 'connect.php') {
    echo '<!DOCTYPE html>';
    echo '<html lang="th"><head><meta charset="UTF-8"><title>เชื่อมต่อฐานข้อมูลสำเร็จ</title>';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
    echo '</head><body class="bg-light p-4">';
    echo '<div class="container">';
    echo '<div class="alert alert-success shadow-sm p-4 rounded-3">';
    echo '<h3 class="alert-heading fw-bold mb-3">✓ เชื่อมต่อฐานข้อมูลสำเร็จ!</h3>';
    echo '<hr>';
    echo '<p class="fs-5 mb-2"><strong>Database Server:</strong> ' . htmlspecialchars($servername) . '</p>';
    echo '<p class="fs-5 mb-2"><strong>Database Name:</strong> ' . htmlspecialchars($dbname) . '</p>';
    echo '<p class="fs-5 mb-0 text-primary"><strong>ผู้จัดทำ:</strong> นางสาวสุวภัทร ปิงเมือง (เลขที่ 1)</p>';
    echo '</div></div></body></html>';
}
?>
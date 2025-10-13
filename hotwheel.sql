
CREATE DATABASE IF NOT EXISTS hotwheels_db;
USE hotwheels_db;


CREATE TABLE IF NOT EXISTS koleksi_hotwheels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_mobil VARCHAR(255) NOT NULL,
    seri VARCHAR(100),
    tahun YEAR,
    keterangan TEXT
);


INSERT INTO koleksi_hotwheels (nama_mobil, seri, tahun, keterangan) VALUES
('Bone Shaker', 'Original 16', 1968, 'Mobil ikonik pertama dari Hot Wheels, desain monster truck retro.'),
('Twin Mill', 'Original 16', 1969, 'Mobil dengan dua mesin V8, menjadi simbol Hot Wheels.'),
('Deora II', 'Original 16', 1968, 'Pickup custom klasik oleh Harry Bentley Bradley.'),
('Mainline 2025', 'Mainline Series', 2025, 'Koleksi terbaru tahun 2025 dari Hot Wheels Mainline.');
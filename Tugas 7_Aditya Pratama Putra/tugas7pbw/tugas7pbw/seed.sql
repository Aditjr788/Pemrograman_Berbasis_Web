-- Create database and tables, then seed data
CREATE DATABASE IF NOT EXISTS tugas7pbw CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tugas7pbw;

CREATE TABLE IF NOT EXISTS mahasiswa (
  npm CHAR(13) PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  jurusan ENUM('Teknik Informatika','Sistem Operasi') NOT NULL,
  alamat TEXT
);

CREATE TABLE IF NOT EXISTS matakuliah (
  kodemk CHAR(6) PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  jumlah_sks INT(3) NOT NULL
);

CREATE TABLE IF NOT EXISTS krs (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  mahasiswa_npm CHAR(13) NOT NULL,
  matakuliah_kodemk CHAR(6) NOT NULL,
  FOREIGN KEY (mahasiswa_npm) REFERENCES mahasiswa(npm) ON DELETE CASCADE,
  FOREIGN KEY (matakuliah_kodemk) REFERENCES matakuliah(kodemk) ON DELETE CASCADE
);

-- Seed mahasiswa
INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES
('2001000000001','Siska Putri','Teknik Informatika',''),
('2001000000002','Ujang Aziz','Teknik Informatika',''),
('2001000000003','Veronica Setyano','Teknik Informatika',''),
('2001000000004','Rizka Nurmala Putri','Teknik Informatika',''),
('2001000000005','Eren Putra','Teknik Informatika',''),
('2001000000006','Putra Abdul Rachman','Teknik Informatika',''),
('2001000000007','Rahmat Andriyadi','Teknik Informatika',''),
('2001000000008','Ayu Puspitasari','Teknik Informatika',''),
('2001000000009','Putri Ayuni','Teknik Informatika',''),
('2001000000010','Andri Muhammad','Teknik Informatika','');

-- Seed matakuliah
INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES
('MK001','Basis Data',3),
('MK002','Pemrograman Berbasis Web',3),
('MK003','Algoritma dan Struktur Data',3),
('MK004','Kajian Jurnal Informatika',2);

-- Seed krs
INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES
('2001000000001','MK001'),
('2001000000002','MK002'),
('2001000000003','MK001'),
('2001000000004','MK003'),
('2001000000005','MK004'),
('2001000000006','MK001'),
('2001000000007','MK001'),
('2001000000008','MK002'),
('2001000000009','MK002'),
('2001000000010','MK003');

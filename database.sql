-- Create database
CREATE DATABASE IF NOT EXISTS sifa;

-- Use the database
USE sifa;

-- Create table data_barang
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    semester INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create table data_mahasiswa
CREATE TABLE IF NOT EXISTS data_mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_mahasiswa VARCHAR(255) NOT NULL,
    nim VARCHAR(50) NOT NULL
);
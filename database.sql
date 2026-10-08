-- Admin accounts
CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  role VARCHAR(20) DEFAULT 'admin'
);

-- Library (pests and diseases in one table, same fields as the app's PestInfo)
CREATE TABLE library_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(50) UNIQUE NOT NULL,
  type ENUM('pest', 'disease') NOT NULL,
  name VARCHAR(100) NOT NULL,
  local_name VARCHAR(100),
  scientific_name VARCHAR(150),
  description TEXT,
  cause TEXT,
  symptoms TEXT,
  prevention TEXT,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- App users
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  device_id VARCHAR(100),
  last_active DATETIME
);

-- Scan history
CREATE TABLE scans (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  result VARCHAR(100),
  confidence FLOAT,
  image_url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Library version (the app checks this to know when to update)
CREATE TABLE library_meta (
  id INT PRIMARY KEY,
  version INT DEFAULT 1,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO library_meta (id, version) VALUES (1, 1);

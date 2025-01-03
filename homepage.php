<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petcare 101</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome for the search icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="shortcut icon" href="pet care.png" type="image/x-icon">
</head>
     


<body>
    
    <header class="header">

        <div class="head">
            <img src="OIP.jfif" alt="pet"  >
            <h1>PETCARE 101</h1>
        </div>  
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button class="search-button">
                <i class="fas fa-search"></i> <!-- Font Awesome search icon -->
            </button>
        </div> 
    </header>
        <div class="sidenav">
        <a href="homepage.php" onclick="showContent('home')">Home</a>
        <a href="index1.html" onclick="showContent('about')" >About us</a>
        <a href="index2.html" onclick="showContent('services')" >Services</a>
        <a href="index3.html" onclick="showContent('blog')">Blog</a>
        <a href="index4.html" onclick="showContent('contacts')">Contacts</a>

        </div>
    <div class="content">
        <section  id="home"class=" tab-content active">
            <h2>Welcome to Petcare 101!</h2>
            <p>We are here to help you provide the best care for your pets. From grooming tips to health advice, our mission is to support you in keeping your furry friends happy and healthy.</p>
        </section>
        <section id="about" class=" tab-content">
            <h2>About Us</h2>
            <p>We are passionate about providing the best care for your pets. Our team consists of experienced professionals dedicated to your pet's health and happiness.</p>
        </section>
    
        <section id="services" class=" tab-content">
            <h2>Our Services</h2>
            <div class="service">
                <h3>Pet Grooming</h3>
                <p>Professional grooming to keep your pet looking and feeling great.</p>
            </div>
            <div class="service">
                <h3>Veterinary Consultations</h3>
                <p>Expert advice on keeping your pets in top health.</p>
            </div>
            <div class="service">
                <h3>Pet Training</h3>
                <p>Helping you train and bond with your pets effectively.</p>
            </div>
        </section>
        <section id="blog" class="tab-content">
            <h2>Blog</h2>
            <p>Read our latest articles on pet care, training tips, and heartwarming pet stories.</p>
        </section>
        <section id="contacts" class="tab-content">
            <h2>Contact Us</h2>
            <p>We would love to hear from you! Reach out for any inquiries or assistance regarding your pets.</p>
        </section>
        
    </div> 
    <footer>
        <p>&copy; 2024 Petcare 101 | All rights reserved</p>
    </footer>
    <script src="script.js"></script>
    
</body>
</html>
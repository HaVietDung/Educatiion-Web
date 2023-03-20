<?php
    include('config.php');
    if(!isset($_SESSION['login-student'])) //nếu khác admin thì ra ngoài
    {
        header("Location:../index.php");
    }
    include('./header.php');
?>
<input type="checkbox" id="sidebar-toggle"> 
<div class="sidebar">
    <div class="sidebar-header">
        <h3 class="brand">
            <span class="fas fa-user-graduate"></span>
            <span>Education</span>
        </h3>
        <label for="sidebar-toggle" class="ti-menu-alt"></label>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="index.php">
                    <span class="ti-home"></span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="far fa-comments"></span>
                    <span>Contact</span>
                </a>
            </li>
            <li>
                <a href="../sign-out.php">
                    <span class="fas fa-power-off"></span>
                    <span>Log out</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="main-content">
    <header>
        <div class="search-wrapper">
            <span class="ti-search"></span>
            <input type="text" placeholder="Search">
        </div>
        <div class="social-icons">
            <div>
                <img src="../image/user.png" alt="">
            </div>
        </div>
    </header>
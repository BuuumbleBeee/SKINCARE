<link rel="stylesheet" href="styles/carticon.css">
<style>

    .custom-dropdown-menu {
        background-color: #343a40; /* Dark background color */
        color: #ffffff; /* White text color */
        width: 100px;
    }
    @keyframes grow {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(1.2);
    }
    }

    .grow:hover {
        animation: grow 0.3s forwards;
    }

    /* Shrink on Hover */
    @keyframes shrink {
        from {
            transform: scale(1);
        }
        to {
            transform: scale(0.8);
        }
    }

    .shrink:hover {
        animation: shrink 0.3s forwards;
    }

    .wide-dropdown {
        width: 230px; /* Set the desired width */
        margin-top: 21px;
    }

    .dropdown-item{
        color: rgba(255, 255, 255, .5);
        font-size: 14px;
    }

    .dropdown-item:hover{
        color: #f8f9fa;
    }

    .custom-dropdown-menu .dropdown-item {
        white-space: normal; /* Allow text to wrap */
    }

    .custom-dropdown-menu .dropdown-item:hover {
        background-color: #495057; /* Slightly lighter background on hover */
    }
    .login_move {
        padding-right: 5%;
    }

    .title {
        padding-left: 3%;
        color: #f2ebeb;
    }
    .icon-link {
    margin-right: 40px;
    color: #fff; /* White color for the icons */
    text-decoration: none;
    font-size: 20px;
    position: relative;
    padding: 0 10px;
    }
    .icon-link:hover {
        color: #cccccc;
    }
    .profile-link {
        margin-left: 10px; /* Space between icons and profile image */
        margin-right: 10px;
    }
    .icon-link i {
        font-size: 20px;
    }

    .icon-link .badge {
        position: absolute;
        top: -5px;
        right: -10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 2px 5px;
        font-size: 10px;
    }

    .dropdown-menu::-webkit-scrollbar {
    width: 8px;
    }

    .dropdown-menu::-webkit-scrollbar-track {
        background: #343a40;
    }

    .dropdown-menu::-webkit-scrollbar-thumb {
        background-color: #6c757d;
        border-radius: 10px;
        border: 2px solid #343a40;
    }
    .navbar-icons {
    display: flex;
    align-items: center;
    }
    .navbar{
        background-color: rgb(112, 72, 72);
    }
    .icon-group {
        display: flex;
        align-items: center;
    }

    .navbar-brand img {
            max-height: 40px; /* Adjust height as needed */
        }
    .navbar-nav .nav-link {
        font-size: 18px; /* Make the navbar items text smaller */
        padding-left: 20px; /* More padding to the left for each item */
        color: #FFFFFF;
    }

    /* Custom styling for navbar-toggler */
    .custom-toggler {
        width: 40px; /* Smaller width for the toggler */
        margin-right: 15px; /* Position toggler on the right side */
    }

    /* Dark theme for navbar-collapse */
    .navbar-collapse.navbar-dark-theme {
        background-color: #343a40; /* Dark background color */
    }

    .navbar-collapse.navbar-dark-theme .nav-link {
        color: #ffffff; /* White text color for links */
    }

    .navbar-collapse.navbar-dark-theme .nav-link:hover {
        color: #cccccc; /* Light gray color on hover */
    }
    .navbar-brand{
        font-family:bold;
        color:#FFFFFF;
        font-size: 25px;
    }

    .navbar-brand:hover{
        color:rgba(0,0,0,.87);
    }

    .split-text{
        width: 20px;
        white-space: pre-wrap;
        line-height:0.8;
    }
    .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #6c757d #343a40;
        }
        .profile-image-small {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        .navbar-toggler{
            color:#ffffff;
        }
        .navbar-toggler-icon{
            color:#ffffff;
        }
</style>


    <nav class="navbar navbar-expand-md fixed-top">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <a class="navbar-brand split-text" href="#">IRA SKINCARE</a>
            <div class="navbar-icons ml-auto">
                <div class="icon-group">
                    <div class="cart-container">
                        <a href="cart.html" class="nav-link icon-link grow">
                            <span class="cart-count" id="cart-count">0</span>
                            <i class="fas fa-shopping-cart icon"></i>
                        </a>
                    </div>
                    <a class="nav-link icon-link grow" href="#">
                        <i class="fas fa-bell"></i>
                    </a>
                    <a class="nav-link icon-link grow" href="#">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="profile.php" class="shrink-image">
                        <?php if (isset($_SESSION['profile_image'])) : ?>
                            <img src="data:image/jpeg;base64,<?php echo $_SESSION['profile_image']; ?>" alt="Profile Image" class="rounded-circle" style="width: 60px; height: 60px;">
                        <?php else : ?>
                            <img src="images/placeholder.jpg" alt="Default Profile Image" class="rounded-circle" style="width: 80px; height: 80px;">
                        <?php endif; ?>
                    </a>
                    <a class="nav-link icon-link grow" href="#" style="margin-left: 30px;">
                        <i class="fas fa-sign-out-alt icon"></i>
                    </a>
                </div>
                
            </div>
        </div>

            
        <script>
            document.getElementById('logout').addEventListener('click', function() {
                window.location.href = 'logout.php';
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" defer></script>
        <script src="notifications.js" defer></script>
        <script src=chat.js defer></script>

    </nav>

    
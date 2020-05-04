    
    

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

            <div class="container">
                
                <a class="navbar-brand" href="<?php URL ?>"> 
                    <img src="<?php echo URL ?>assets/images/logos/logo-black.PNG" alt="United2Care" style="width: 100px">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL  ?>blog/admin/index.php"> Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL  ?>blog/admin/index.php">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL  ?>blog/admin/posts/create.php">Create Posts</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo URL  ?>blog/admin/categories/categories.php">Categories</a>
                                <a class="dropdown-item" href="<?php echo URL  ?>blog/admin/categories/create.php">Create</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tags
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo URL  ?>blog/admin/tags/tags.php">Tags</a>
                                <a class="dropdown-item" href="<?php echo URL  ?>blog/admin/tags/create.php">Create</a>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL  ?>blog/admin/account/logout.php">Logout</a>
                        </li>
                    
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br>

    
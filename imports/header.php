<?php
$sub_categories_array = array(); 
$select_sub_categories = mysqli_query($localhost, "SELECT * FROM `ref_sub_categories` ");
while($fetch_sub_categories = mysqli_fetch_array($select_sub_categories)){
    array_push($sub_categories_array, array(
        'id' => $fetch_sub_categories['id'],
        'name' => $fetch_sub_categories['name'],
        'url' => URL.'posts?cat='.$fetch_sub_categories['id'].'&category='.$fetch_sub_categories['name'],
    ));
}
?>

<header id="header" class="wpo-site-header wpo-header-style-3">
    

    <nav class="navigation navbar navbar-default">
        <div class="container menuBar">

            <div class="col-lg-6 navbar-header">
                <a class="navbar-brand" href="<?php echo URL ?>"><img src="<?php echo URL ?>assets/images/logo/united.png" alt="logo"></a>
            </div>

            <div class="col-lg-6 donateButton">
                <a href="https://docs.google.com/forms/d/12mZmY1kFh4jEKbHAKIHLSb7cjKeUMv3TlpphYUVK9a4/edit" target="_blank" class="hide-xs"> <span  class="theme-btn">Volunteer with us</span> </a>
                <a href="#" data-toggle="modal" data-target="#donateCashModal" > <span  class="theme-btn">Donate</span> </a>
                <!-- <a href="<?php echo URL ?>donation"> <span  class="theme-btn">Donate</span> </a> -->
            </div>

        </div><!-- end of container -->
    </nav>
</header>
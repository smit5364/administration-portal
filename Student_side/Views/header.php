<?php
include('Controllers/header_controller.php');
?>
    <div class="navbar">
        <nav class="bg-white w-full h-14">
            <ul class="flex items-center justify-between pt-1">
                <li><a href="home" class="flex"><img src="Assets/images/BMCCA_logo.png" alt="" class="object-cover w-12 mx-1"><img src="Assets/images/Bhagwan Mahavir College of Computer Application.svg" alt="" class="md:ml-2"></a></li>
                <li id="btn_student"><?php if (!isset($_SESSION['enrollment'])) { ?>
                        <img src="Assets/images/user.svg" alt="" class="w-12 mx-1 cursor-pointer" />
                    <?php } else { 
                        letters_images();
                    }?>
                </li>
            </ul>
        </nav>
    </div>
<body>
<style>
    .swal-modal{
        padding-top: 10px;
        padding-bottom: 15px;
    }
    .swal-text{
        font-size: 20px;
        text-align: center;
    }
    
    .swal-button{
        background-color: #4F46E5;
    }
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php if(isset($_SESSION['title']) && $_SESSION['title'] != ""){?>
            swal({
                title: "<?php echo $_SESSION['title'];?>",
                icon: "<?php echo $_SESSION['status_code'];?>",
                button: false,
                timer: 1500,
            });
        <?php } ?>
        <?php unset($_SESSION['title']);
            unset($_SESSION['status_code']);?>
    </script>
</body>
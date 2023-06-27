<body>
<style>
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
        <?php if(isset($_SESSION['status'])){?>
        swal({
            title: "<?php echo $_SESSION['title'];?>",
            text: "<?php echo $_SESSION['status'];?>",
            icon: "<?php echo $_SESSION['status_code'];?>",
            button: true,
        });
        <?php } ?>
        <?php unset($_SESSION['status']);?>
    </script>
</body>
<!-- footer  -->
<!-- start social follow -->
<div class="container-fluid bg-danger">
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a class="text-white social hover" href=""><i class="fab fa-facebook-f"></i>facebook</a>
        </div>
        <div class="col-sm">
            <a class="text-white social hover" href=""><i class="fab fa-twitter"></i>Twitter</a>
        </div>
        <div class="col-sm">
            <a class="text-white social hover" href=""><i class="fab fa-whatsapp"></i>Whats app</a>
        </div>
        <div class="col-sm">
            <a class="text-white social hover" href=""><i class="fab fa-instagram"></i>Instagram</a>
        </div>

    </div>
</div>
<!-- end social follow -->

<!-- start about section -->



<!-- end about section -->


<!-- footer -->
<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white"> Copyright &copy; 2021 || Designed by E-Learning || <a href="#login" data-toggle="modal"
            data-target="#adminLoginModalCenter"> Admin login </a> </small>
</footer>
<!-- end footer -->

<!-- start student Registration form -->
<?php
   include('student_reg.php');
   ?>
<!-- end form(student register ) -->


<!-- start student LOgin form -->
<?php
   include('student_log.php');
   ?>
<!-- end form(student Login) -->



<!-- start Admin LOgin form -->
<?php
   include('admin_log.php');
   ?>
<!-- end form(Admin Login) -->






<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="js/all.min.js"></script>
<!-- <script src="jquery.min.js"></script> -->
<!-- <script src="owlcarousel/owl.carousel.min.js"></script> -->

<!-- student ajax call javascript -->
<script src="js/ajaxrequest.js"></script>
<script src="js/adminAjaxRequest.js"></script>
</body>


</html>
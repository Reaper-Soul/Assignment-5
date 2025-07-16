<?php include 'app/views/templates/alert.php'; ?>

<!-- Scroll-to-Top Button -->
<button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">↑</button>

<footer class="footer fixed-bottom pt-3 bg-dark text-white">    
    <div class="column">
        <div class="row-lg-12 text-center">
            <ul class="d-flex flex-row list-unstyled justify-content-center fs-5 mb-1">
                <li>
                    <a href="https://github.com/Reaper-Soul/Assignment-5" target="_blank">
                        <i class="fa-brands fa-github me-4 text-white"></i>
                    </a>
                </li>
                <li>
                    <a href="mailto:navisharma@algomau.ca" target="_blank">
                        <i class="fa-solid fa-envelope text-white"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row-lg-12 text-center">
            <p class="fs-5 mb-1">Made with ❤️ by Navish Sharma</p>
        </div>
        <div class="row-lg-12 text-center">
            <p class="mb-2">Copyright &copy; <?php echo date('Y'); ?> </p>
        </div>
    </div>
</footer>

<!-- Font Awesome & Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Custom Styles -->
<style>
    li {
        cursor: pointer;
    }
    .alert {
        z-index: 99;
        position: relative;
    }
    #scrollTopBtn {
        display: none;
        position: fixed;
        bottom: 80px; /* Place above the footer */
        right: 30px;
        z-index: 999;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        padding: 10px 15px;
        border-radius: 10px;
        box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
    }
    #scrollTopBtn:hover {
        background-color: #0056b3;
    }
</style>

<!-- Scroll Button Script -->
<script>
    // Show scroll button when user scrolls down
    window.onscroll = function () {
        const btn = document.getElementById("scrollTopBtn");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            btn.style.display = "block";
        } else {
            btn.style.display = "none";
        }
    };

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>

</body>
</html>

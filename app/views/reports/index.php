<?php
    if (strtolower($_SESSION['username']) !== 'admin') {
        header('Location: /home');
        exit;
    }
?>
<?php require_once 'app/views/templates/header.php' ?>
<div class="container my-4">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Analystics 📊</h2>
                    <div class="d-flex flex-row gap-4 mt-4 px-2">
                        <!-- CARD #1 -->
                        <div class="card" style="width: 18rem;">
                              <img height='200' src="https://plus.unsplash.com/premium_vector-1745322585380-b35a3a4ce324?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-semi-bold">Reminders</h5>
                                <p class="card-text text-wrap text-secondary">Displays the whole list of reminders created by the users, their creation time, and also provide details like who has the most number of active reminders.</p>
                                <a href="reports/reminders" class="btn btn-dark">View</a>
                            </div>
                        </div>
                         <!-- CARD #2 -->
                        <div class="card" style="width: 18rem;">
                              <img height='200' src="https://images.unsplash.com/vector-1739893035568-bbea72128361?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8dXNlciUyMGljb258ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-semi-bold">User Info</h5>
                                <p class="card-text text-wrap text-secondary">Displays some information regarding the users of the website, specifically their usernames, their last login time, etc.</p>
                                <a href="reports/user_info" class="btn btn-dark">View</a>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>  
        </div>
    </div>
</div>   
<?php require_once 'app/views/templates/footer.php' ?>
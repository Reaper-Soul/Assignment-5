<?php
$current_page = $_SESSION['current_page'] ?? '';
if (!isset($_SESSION['auth'])) {
    header('Location: /login');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #63c5da;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:white; font-weight: bold;">COSC 4806</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="me-auto">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= ($current_page == 'home') ? 'active' : '' ?>" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($current_page == 'reminders') ? 'active' : '' ?>" href="/reminders">My Reminders</a>
        </li>
      </ul>
    </div>
    <div class="d-flex ms-auto">
                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#newReminderModal"> <i class="fas fa-plus me-2"></i> New Reminder</button>
    </div>
    </div>
  </div>
</nav>

<!--reminder modal-->      
<div class="modal fade" id="newReminderModal" tabindex="-1" aria-labelledby="newReminderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newReminderModalLabel">Create New Reminder</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/reminders/create" method="POST">
                <div class="mb-3">
                  <label for="reminder-title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="reminder-title" name="reminder-title" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Reminder</button>
              </form>
      </div>
    </div>
  </div>
</div>
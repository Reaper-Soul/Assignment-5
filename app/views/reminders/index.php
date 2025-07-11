<?php require_once 'app/views/templates/header.php' ?>
<div class="container my-4">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Reminders</h2>
              <table class="table table-bordered table-striped mt-4">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Mark as Complete</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($reminder_list as $index => $reminder): ?>
                    <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= htmlspecialchars($reminder['subject']) ?></td>
                      <td>
                        <form action="/reminders/complete" method="POST" class="d-inline">
                          <input type="hidden" name="id" value="<?= $reminder['id'] ?>">
                          <input type="checkbox" name="completed" value="1" onchange="this.form.submit()" <?= $reminder['is_completed'] ? 'checked' : '' ?>>
                        </form>
                      </td>
                      <td>
                        <form action="/reminders/delete" method="POST" style="display:inline;">
                          <input type="hidden" name="id" value="<?= $reminder['id'] ?>">
                          <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>

<?php require_once 'app/views/templates/footer.php' ?>

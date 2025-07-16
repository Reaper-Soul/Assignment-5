<?php
    if (strtolower($_SESSION['username']) !== 'admin') {
        header('Location: /home');
        exit;
    }
?>
<?php require_once 'app/views/templates/header.php' ?>
<div class="container d-flex flex-column" style="height: 70vh">
    <div class="d-flex row">
            <h2 class="mt-4">Users Report 📊</h2>
    </div>
    <div class="conatiner-fluid h-100 d-flex flex-row gap-5 mt-3" >
        <div class="column d-flex flex-column gap-1 bg-body p-3" style="flex: 4;">
            <div class="d-flex flex-row gap-3 justify-content-between">
              <!-- CARD-1 -->
                <div class="card bg-dark text-white p-3 mb-3" style="flex: 3; border-radius: 5%;">
                  <div class="card-title">Total Users</div>
                  <div class="card-body">
                    <p class="fs-3 text-info"><?= $count ?></p>
                  </div>
                </div>
              <!-- CARD-2 -->
                <div class="card bg-dark text-white p-3 mb-3" style="flex: 3; border-radius: 5%;">
                  <div class="card-title">Login Today</div>
                  <div class="card-body">
                    <p class="fs-3 text-info"><?= end($activity) ?></p>
                  </div>
                </div>
              <!-- CARD-3 -->
                <div class="card bg-dark text-white p-3 mb-3" style="flex: 3; border-radius: 5-%;">
                  <div class="card-title">Most Active</div>
                  <div class="card-body">
                    <p class="fs-3 text-info"><?= $user ?></p>
                  </div>
                </div>
            </div>
            <h4>Activity Chart 📈</h4>
            <canvas id="remindersChart" style="width:100%;"></canvas>
        </div>
      <div class="column d-flex flex-column" style="flex: 6; height: 90%;">
        <div class="table-wrapper flex-grow-1 overflow-auto">
          <table class="table table-bordered table-striped mb-20">
            <thead class="table-light position-sticky top-0 bg-light">
              <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Login Time</th>
                <th>Login Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($attempts)): ?>
                <?php foreach ($attempts as $index => $attempt): ?>
                  <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($attempt['username']) ?></td>
                    <td><?= date('d M Y, h:i A', strtotime($attempt['time'])) ?></td>
                    <td><?= htmlspecialchars($attempt['attempt']) ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4" class="text-center">No user record found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div> 
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        const getPastDates = () => {
            const labels = [];
            const today = new Date();

            for (let i = 4; i >= 0; i--) {
              const d = new Date(today);
              d.setDate(today.getDate() - i);

              labels.push(
                i === 0
                  ? 'Today'
                  : d.toLocaleDateString('en-GB', {
                      day: '2-digit',
                      month: 'short'
                    })
              );
            }
            return labels;
          };

        const activityData = <?= json_encode($activity) ?>;

        const ctx = document.getElementById('remindersChart').getContext('2d');

          const remindersChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: getPastDates(),
              datasets: [{
                label: 'Login Made',
                data: activityData,
                fill: true,
                borderColor: '#63c5da',
                tension: 0,
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: true,
              plugins: {
                legend: {
                  display: false,
                }
              },
              scales: {
                y: {
                  beginAtZero: false,
                  ticks: {
                    precision: 0,
                  }
                }
              }
            }
          });
</script>   
<?php require_once 'app/views/templates/footer.php' ?>

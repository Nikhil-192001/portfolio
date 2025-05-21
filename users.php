<?php include 'contact_process.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets\css\admin.css" />
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block sidebar py-4">
        <div class="text-center mb-4">
          <h4>Admin</h4>
        </div>
        <ul class="nav flex-column px-3">
          <li class="nav-item mb-2"><a class="nav-link" href="#">Dashboard</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="#">Users</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="#">Services</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="#">Orders</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="#">Settings</a></li>
        </ul>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
        <!-- Topbar -->
        <div class="topbar py-3 px-3 d-flex justify-content-between align-items-center">
          <h5 class="m-0">Dashboard</h5>
          <button class="btn btn-outline-dark btn-sm">Logout</button>
        </div>

        <!-- Dashboard Content -->
        <div class="content mt-4">
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title">Users</h5>
                  <p class="card-text">Total: 120</p>
                </div>
              </div>
            </div>
            <div class="container mt-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Users List</h4>
                <button class="btn btn-success" onclick="exportTableToExcel('usersTable', 'users')">Download Excel</button>
              </div>

              <table class="table table-bordered table-striped" id="usersTable">
                <thead class="table-dark">
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM 'nikhil-portfolio' "; // make sure your table name is 'users'
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . htmlspecialchars($row['subject']) . "</td>
                                <td>" . htmlspecialchars($row['message']) . "</td>
                                <td>
                                  <a href='update.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>Update</a>
                                  <a href='delete.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                </td>
                              </tr>";
                    }
                  } else {
                    echo "<tr><td colspan='5' class='text-center'>No users found</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.sheetjs.com/xlsx-0.20.0/package/dist/xlsx.full.min.js"></script>

  <script>
    function exportTableToExcel(tableId, filename = '') {
      const table = document.getElementById(tableId);
      const wb = XLSX.utils.table_to_book(table, {
        sheet: "Users"
      });
      XLSX.writeFile(wb, filename ? filename + ".xlsx" : "users.xlsx");
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Template</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Banquet</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Hall Booking</a></li>
            <li><a class="dropdown-item" href="#">Outdoor Catering</a></li>
            <li><a class="dropdown-item" href="#">Markers</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Restaurant</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="restaurant_sale.php">Sales</a></li>
            <li><a class="dropdown-item" href="#">Purchase</a></li>
            <li><a class="dropdown-item" href="#">Voucher</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Lodge</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Sales</a></li>
            <li><a class="dropdown-item" href="#">Purchase</a></li>
            <li><a class="dropdown-item" href="#">Voucher</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Payroll</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Advance</a></li>
            <li><a class="dropdown-item" href="#">Loans</a></li>
            <li><a class="dropdown-item" href="#">Attendence</a></li>
            <li><a class="dropdown-item" href="#">Employee Master</a></li>
            <li><a class="dropdown-item" href="#">Process Payroll</a></li>
            <li><a class="dropdown-item" href="#">Salary Register</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Reports</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Banquet</a></li>
            <li><a class="dropdown-item" href="#">Lodge</a></li>
            <li><a class="dropdown-item" href="#">Restaurant</a></li>
            <li><a class="dropdown-item" href="#">Payroll</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Config</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Master Data</a></li>
          </ul>
        </li>
      </ul>

      <form class="d-flex mx-auto ">
        <select class="form-select form-select-sm" name="company_id" id="company_id"
          onchange="switchCompany(this.value)">
          <option value="1">Uday Bhuvan</option>
          <option value="2">New Uday Bhuvan</option>
          <option value="3">UB Cafe</option>
        </select>
      </form>

      <form class="d-flex mx-auto ">
        <select class="form-select form-select-sm" name="company_id" id="company_id"
          onchange="switchBranch(this.value)">
          <option value="1">Uday Bhuvan</option>
          <option value="2">New Uday Bhuvan</option>
          <option value="3">UB Cafe</option>
        </select>
      </form>

      <ul class='navbar-nav'>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <strong> Username </strong>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </div>
</nav>
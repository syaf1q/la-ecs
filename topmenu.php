
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="page.php?menushort=dashboard"><img src="img/utm-logo.png" alt="Logo" height="100"/></a>
    </div><br><br>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
		<li> Welcome <strong><?php echo $_SESSION['fullname'];?> [<?php echo $_SESSION['type'];?>]</strong></li>
        <li> <a href="logout.php"> <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout </a> </li>  
      </ul>
    </div>
  </div>
</nav>

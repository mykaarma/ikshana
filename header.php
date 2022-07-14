<style>
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #06508f;
  overflow-x: hidden;
  
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0s;
}
.sidenav a:hover
{
  text-decoration: underline;

}
.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="dashboard.php">Dashboard</a>
  <a href="detail500.php">500 Detailed View</a>
  <a href="detail504.php">504 Detailed View</a>
  <a href="chaos.php">Chaos Engineering</a>
  <a href="slow.php">Slow Query Summary</a>
  <a href="logout.php">Logout</a>
</div>
<section style="background-color: #06508f;text-align: center;color:white;">
  <div class="col-sm-12">
    <div class="col-sm-2">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    </div>
    <div class="col-sm-8">
       <h3>Alerting Portal</h3>
    </div>
    <div class="col-sm-2">
      <p>User-details</p>
    </div>
  </div>
</section>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

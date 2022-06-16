<?php
	session_start();
	extract($_REQUEST);
	include('Connections/connection.class.php');
	include('log_action.php'); 
?>
<body bgcolor="#fff">
<?php		
	
	if($username == '' || $password == ''){ ?>
		<script>
		alert('Maklumat tidak lengkap.');
		setTimeout("location.href = 'index.php';",0);
		</script>
<?php
	}else{
	
	
	$sql="select a.id, a.username, a.fullname, a.icno, a.usertype, b.name from userinfo a, usertype b where a.usertype=b.id and a.username = '$username' and a.password = '$password' and a.active = 1";
	$query=mysql_query($sql,connect());
	$row=mysql_fetch_array($query);
	$count=mysql_num_rows($query);
	 
	if($count>0){
		$_SESSION['id']=$row['id'];
		$_SESSION['username']=$row['username'];
		$_SESSION['password']=$password;
		$_SESSION['fullname']=$row['fullname'];
		$_SESSION['icno']=$row['icno'];
		$_SESSION['usertype']=$row['usertype'];
		$_SESSION['type']=$row['name'];
		
		logrecord('Login', 'Log In Masuk', 'Log Masuk = '.$row['fullname']);
?>
	<table width="100%">
        <tr>
            <td align="center"><img src="img/loading.gif" border="0" /></td>
        </tr>
    </table>
		<script type="text/JavaScript">
		setTimeout("location.href = 'page.php?menushort=dashboard';",1500);
		</script>
<?php		
	}
	else{?>
		<script>
		alert('Nama pengguna atau kata laluan yang anda masukkan tidak sah. Sila cuba lagi.');
		setTimeout("location.href = 'index.php';",0);
		</script>
		<?php
	}
	}
?>
</body>
<?php
	require_once("perpage.php");	
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	
	$name = "";
	$code = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("name","code");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "name":
						$name = $v;
						$queryCondition .= "name LIKE '" . $v . "%'";
						break;
					case "code":
						$code = $v;
						$queryCondition .= "code LIKE '" . $v . "%'";
						break;
				}
			}
		}
	}
	$orderby = " ORDER BY id desc"; 
	$sql = "SELECT * FROM toy " . $queryCondition;
	$href = 'crud.php';					
		
	$perPage = 2; 
	$page = 1;
	if(isset($_POST['page'])){
		$page = $_POST['page'];
	}
	$start = ($page-1)*$perPage;
	if($start < 0) $start = 0;
		
	$query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
	$result = $db_handle->runQuery($query);
	
	if(!empty($result)) {
		$result["perpage"] = showperpage($sql, $perPage, $href);
	}
?>
<html>
	<head>
	<title> CRUD </title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<h2>Aplikasi crud</h2>
		<div style="text-align:right;margin:20px 0px 10px;">
		<a id="btnAddAction" href="add.php">Tambah Baru</a>
		<a id="btnAddAction" href="index.html">Home</a>
		</div>
    <div id="toys-grid">      
			<form name="frmSearch" method="post" action="crud.php">
			<div class="search-box">
			<p><input type="text" placeholder="Nama" name="search[name]" class="demoInputBox" value="<?php echo $name; ?>"	/><input type="text" placeholder="Kode" name="search[code]" class="demoInputBox" value="<?php echo $code; ?>"	/><input type="submit" name="go" class="btnSearch" value="Cari"><input type="reset" class="btnSearch" value="Reset" onclick="window.location='crud.php'"></p>
			</div>
			
			<table cellpadding="10" cellspacing="1">
        <thead>
					<tr>
          <th><strong>Nama</strong></th>
          <th><strong>Kode</strong></th>          
          <th><strong>Kategori</strong></th>
					<th><strong>Harga</strong></th>
					<th><strong>Stok</strong></th>
					<th><strong>Opsi</strong></th>
					
					</tr>
				</thead>
				<tbody>
					<?php
					if(!empty($result)) {
						foreach($result as $k=>$v) {
						  if(is_numeric($k)) {
					?>
          <tr>
					<td><?php echo $result[$k]["name"]; ?></td>
          <td><?php echo $result[$k]["code"]; ?></td>
					<td><?php echo $result[$k]["category"]; ?></td>
					<td><?php echo $result[$k]["price"]; ?></td>
					<td><?php echo $result[$k]["stock_count"]; ?></td> 
					<td>
					<a class="btnEditAction" href="edit.php?id=<?php echo $result[$k]["id"]; ?>">Ubah</a> <a class="btnDeleteAction" href="delete.php?action=delete&id=<?php echo $result[$k]["id"]; ?>">Hapus</a>
					</td>
					</tr>
					<?php
						  }
					   }
                    }
					if(isset($result["perpage"])) {
					?>
					<tr>
					<td colspan="6" align=right> <?php echo $result["perpage"]; ?></td>
					</tr>
					<?php } ?>
				<tbody>
			</table>
			</form>	
		</div>
	</body>
</html>
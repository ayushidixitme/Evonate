<?php include('adminheader.php');?>

 

    <div class=" jumbotron">

        <h2><b>Add Category</b></h2>

		<?php
		$nameErr="";
		$name="";
		STATIC 	$sql="";
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
		  if (empty($_POST["categoryname"])) {
			$nameErr = "Category Name is required";
		  } else if(empty($_POST["catId"])) {
			$name = test_input($_POST["categoryname"]);
			$sql="Call category_Master('".$name."','add','0')";
			}
		  else if (!empty($_POST["catId"]) && !empty($_POST["categoryname"])) {
			$sql="Call category_Master('".$_POST["categoryname"]."','update','".$_POST["catId"]."')";
			 echo "<script>console.log('updateing')</script>";
		  }
		  echo $sql;
		  		$result= call($sql);
				
				if(is_object($result))
				{	
						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							if($row["StatusCode"]==1){
							$msg=$row["msg"];
							}
							else{
								$nameErr=$row["msg"];
							 }
					}
			}
			}
		
		
				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}
			
			
			?>
		<script>	
			function edcat(id,btn)
			{
				btn.innerHTML= btn.innerHTML=="Disable"?"Enable":"Disable";
				var span="#span"+id;
				if($(span)[0].classList.value=="btn btn-success")
				{
				$(span).addClass("btn-danger").removeClass("btn-success").html("NotActive");
				}
				else
				{
				$(span).addClass("btn-success").removeClass("btn-danger").html("Active");;
				}
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
					xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("msg2").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","admin.php?id="+id,true);
				xmlhttp.send();
			}
			function edcatHome(id,btn)
			{
				//btn.innerHTML= btn.innerHTML=="Disable"?"Enable":"Disable";
				var span="#span1"+id;
				if($(span)[0].classList.value=="btn btn-success")
				{
				$(span).addClass("btn-danger").removeClass("btn-success").html("NotActive");
				}
				else
				{
				$(span).addClass("btn-success").removeClass("btn-danger").html("Active");;
				}
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
					xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("msg2").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","admin.php?cidHome="+id,true);
				xmlhttp.send();
			}
			function editcat(id)
			{
				
			document.getElementById("btnsub").innerHTML ="Update";
			
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("catname").value = this.responseText.trim().split('|')[0];
					document.getElementById("txtId").value = this.responseText.trim().split('|')[1];
				}
			};
			xmlhttp.open("GET","admin.php?Edit="+id,true);
			xmlhttp.send();	
			}
		</script>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="category">Category</label>
                <input name="categoryname" id="catname" placeholder="Category Name" class="form-control" />
				<span class="error fade-in"> <?php echo $nameErr;?></span>
				<span class="success fade-in"> <?php echo $msg;?></span>
            </div>
           <!--  <div class="form-group">
                <label>Description</label>
                <textarea name="desc" class="form-control" placeholder="Category Description"></textarea>
            </div> -->
			<input type="hidden" id="txtId" name="catId"/>
            <button type="submit" class="btn btn-default" id="btnsub">Add</button>
        </form>

		
		

    </div>

    <div class="jumbotron">

        <h2>Available Category</h2>
		<span class="success" id="msg2">  </span>
        <table class="table table-stripped table-hover">
            <thead>
                <tr>
                    <td>Category Id</td>
                    <td>Catgeory Name</td>
                    <td>Is Active</td>
					<td>Is Home</td>
                    <td>Options</td>
                </tr>
            </thead>
			<?php
					$result=call("call category_Master('','selectall',0)");		
			        if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						
						$btn =(($row["IsActive"]==true)?"Disable":"Enable");
					echo "<tr><td>".$row["catId"]."</td><td>".$row["categoryName"]."</td><td><span id='span".$row["catId"]."' class=\"btn btn-".(($row["IsActive"]==true)?"success":"danger")."\">".(($row["IsActive"]==true)?"Active":"NotActive")."</span></td>
					<td><span id='span1".$row["catId"]."' class=\"btn btn-".(($row["isHome"]==true)?"success":"danger")."\">".(($row["isHome"]==true)?"true":"false")."</span></td>
					<td><button onclick=\"edcat('".$row["catId"]."',this)\"  >$btn</button><button onclick=\"edcatHome('".$row["catId"]."',this)\"  >ToggleHome</button><button onclick=\"editcat('".$row["catId"]."')\" >Edit</button></td></tr>"   ;
						}
					} 
					else {
						echo "0 results";
					}
		?>
			
        </table>


    </div>

<?php include('adminfooter.php');?>
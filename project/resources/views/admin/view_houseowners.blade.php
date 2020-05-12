<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>	

	<h1>House Providers List</h1>&nbsp
	<a href="{{route('admin.index')}}">back</a> |
	<a href="{{route('logout')}}">Logout</a> | <br><br> 

	<form method="get" action="{{ route('searchCounter') }}">
	@csrf
		Search House providers by username : 

		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by username" title="Type Name">

		</form>




	<table id="myTable" border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Phone</th>
			<th>National ID</th>
			<th>Address</th>
			<th>TYPE</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		
		@foreach($houseowners as $user)
		<tr>
			<td>{{$user['fname']}}</td>
			<td>{{$user['lname']}}</td>
			<td>{{$user['username']}}</td>
			<td>{{$user['email']}}</td>
			<td>{{$user['phone']}}</td>
			<td>{{$user['nid']}}</td>
			<td>{{$user['address']}}</td>
			<td>{{$user['type']}}</td>
			<td>{{$user['status']}}</td>
			<td>
				<a href="{{route('admin.delete2', $user['userId'])}}">Delete Account</a> 
			</td>
		</tr>
		@endforeach
	</table>

	<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
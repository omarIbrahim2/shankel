<h1>HELLO TO DASHBOARD</h1>

<form id="outForm" action="{{route("logout" , "web")}}" method="post">
    @csrf
</form>
<button form="outForm" class="custom-out-btn" type="submit">Sign Out</button>
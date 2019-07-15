@extends('layouts.app')
@section('content')
<div class="container">   
	<form action="{{ route('custom.search') }}" method="post">
	  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
	  <div class="input-group mb-2">
	    <div class="input-group-prepend">
	      <span class="input-group-text">CustomName</span>
	    </div>
	    <input type="text" name="name" class="form-control">
	  	<button type="submit" class="btn btn-primary">Search</button>
	  </div>
	</form>
  	<table class="table table-hover table-bordered">
	    <thead>
	    <tr>
			<th colspan="4"><a href="{{ route ('custom.create') }}">Add Custom</a></th>
	    </tr>
	      <tr>
	        <th>CustomName</th>
	        <th>createdAt</th>
	        <th>UpdatedAt</th>
	        <th>Operate</th>
	      </tr>
	    </thead>
	    <tbody>
	    @if (count($customs) !== 0)
		    @foreach ($customs as $custom)
		      <tr>
		        <td>{{ $custom['name'] }}</td>
		        <td>@localTime($custom['created_at'])</td>
		        <td>@localTime($custom['updated_at'])</td>
		        <td>
		        <a href="{{ route ('custom.edit',['id'=>$custom['id']]) }}">Edit</a>
		        <a href="javascript:;" onclick="customDelete(this)" data-url="{{ route ('custom.destroy',['id'=>$custom['id']]) }}" data-token="{{ csrf_token() }}">Delete</a>
		        </td>
		      </tr>
		    @endforeach
		@else
			<tr>
		        <td colspan="4" align="center">No Record</td>
		    </tr>
		@endif
	    </tbody>
  	</table>
  	{{ $customs->appends($para)->links() }}
</div>
<script type="text/javascript">
 //删除客户信息
function customDelete(dom){
	if(dom.dataset.url&&dom.dataset.token){
	 $.ajax(
      	{
            url: dom.dataset.url,
            type: 'DELETE',
            dataType: "JSON",
            data: {
                "_token": $('input[name="T_csrf_token"]').val()
            },
            success: function (response)
            {
            	$(dom).parents("tr").remove()
                T_alert(response);
            }
        });
	}
}
</script>
@endsection


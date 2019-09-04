<tbody id='teacherNotVerifyTable' class="d-none">
@foreach($user as $item)
 @if($item->admin_confirmed==0)
 <tr>
  <td>{{ $item->user->id }}</td>
  <td>{{ $item->user->dni }}</td>
  <td>{{ $item->user->name }}</td>
  <td>{{ $item->user->lastname }}</td>
  <td>{{ $item->user->email }}</td>
  <td>
    {{$item->admin_confirmed==0 ? 'No Verificado':'Verificado' }}
  </td>
  <td>{{ $item->user->last_login}}</td>
  <td>{{ $item->user->created_at }}</td>
  <td>{{ $item->user->updated_at }}</td>
  <td>
   <a class="btn-primary btn"><i class="fa fa-eye"></i></a>
   <a class="btn-danger btn"><i class="fa fa-remove"></i></a>
   <a class="btn-info btn"><i class="fa fa-edit"></i></a>

   <a href="{{ route('admin.verify', $item->user->slug)}}" class="btn-warning btn"><i class="fa fa-vimeo"></i></a>
 </td>
</tr>
@endif
@endforeach
</tbody>
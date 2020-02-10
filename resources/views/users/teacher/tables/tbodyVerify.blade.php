<tbody id='teacherVerifyTable' class="d-none">
 @forelse($teacher as $item)
 @if($item->admin_confirmed!=0)
 <tr>
  <td>{{ $item->id }}</td>
  <td>{{ $item->user->dni }}</td>
  <td>{{ $item->user->name }}</td>
  <td>{{ $item->user->lastname }}</td>
  <td>{{ $item->user->email }}</td>
  <td>
    {{ $item->admin_confirmed==1?'Verificado':'No Verificado'}}
  </td>
  <td>{{ $item->user->last_login }}</td>
  <td>{{ $item->user->created_at }}</td>
  <td>{{ $item->user->updated_at }}</td>
  <td>
    <a class="btn-primary btn" href="{{route('Profile.Teacher.show',$item->slug)}}" title="Ver Usuario"><i class="fa fa-eye"></i></a>
    <a class="btn-danger btn" href="#" onclick="deletes('{{$item->user->slug}}','/User/Delete/')" title="Borrar Usuario"><i class="fa fa-remove"></i></a>
    <a href="#" onclick="verify_user('{{$item->slug}}','/AdminVerify/','Remover Verificación')" title="Remover Verificación" class="btn-warning btn"><i class="fa fa-vimeo"></i></a>
 </td>
</tr>
@endif
@empty
  <tr>
    <td>
      <font>No hay profesores verificados</font>
    </td>
  </tr>
@endforelse
</tbody>
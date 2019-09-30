<tbody id='teacherAllTable' class="">
 @forelse($teacher as $item)
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
    <a class="btn-danger btn" href="{{route('User.delete',$item->user->slug)}}" title="Borrar Usuario"><i class="fa fa-remove"></i></a>
    @if($item->admin_confirmed!=1)
    <a href="{{ route('admin.verify', $item->slug)}}" title="No Verificado" class="btn-success btn"><i class="fa fa-vimeo"></i></a>
    @else
    <a href="{{ route('admin.verify', $item->slug)}}" title="Remover Verificacion" class="btn-warning btn"><i class="fa fa-vimeo"></i></a>
    @endif
 </td>
</tr>
@empty
  <tr>
    <td>
      <font>No hay profesores</font>
    </td>
  </tr>
@endforelse
</tbody>
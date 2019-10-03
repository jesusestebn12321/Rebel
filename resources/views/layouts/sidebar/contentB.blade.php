<li class="nav-item">
	<a class="nav-link font-italic" href="{{route('Matter.index')}}">
		<i class="ni ni-book-bookmark text-indigo"></i> Unidad Curricular
	</a>
</li>
@if($matter_user)
	@if($matter_user->type==0)
	<li class="nav-item">
		<a class="nav-link font-italic" href="{{route('Contents.index')}}">
			<i class="ni ni-folder-17 text-info"></i> Cargar Contenido
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link font-italic" href="{{route('Contents.index')}}">
			<i class="ni ni-folder-17 text-info"></i> Asignar materia al profesor
		</a>
	</li>
	@else
	<li class="nav-item">
		<a class="nav-link font-italic" href="{{route('Contents.show',$matter_user->matter_id)}}">
			<i class="ni ni-folder-17 text-info"></i> Ver Contenido
		</a>
	</li>
	@endif
@endif
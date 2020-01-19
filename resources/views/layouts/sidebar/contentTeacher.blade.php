<li class="nav-item">
	<a class="nav-link font-italic" href="{{route('Matter.index')}}">
		<i class="ni ni-book-bookmark text-indigo"></i> Unidad Curricular
	</a>
</li>
@if($teacher)
	@if($teacher->hasRole(5))
	<li class="nav-item">
		<a class="nav-link font-italic" href="{{route('Matter.asignar.index')}}">
			<i class="ni ni-folder-17 text-info"></i> Asignar materia al profesor
		</a>
	</li>
	@else
	@endif
@endif
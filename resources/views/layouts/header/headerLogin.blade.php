@guest
<div class="alert" style="position: fixed;width:100%;left:0;top:0;border-radius:0px;height:2.5cm;
background-color: rgba(100, 100, 100, .2)">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<h3 class="text-white" style="padding-left:30%;padding-top:1rem">Descarga de los contenidos de las Und. Curriculares <a href="#" data-target='#downloadPublic' data-toggle='modal' class="btn bg-gradient-indigo text-white" >Descargar</a></h3>
</div>
<div class="container">
  <div class="header-body text-center mb-7">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-12">
        <a href="{{url('/')}}" class="text-white"><p class="text-lead text-white rebel" style="font-size:2cm">REBEL</p></a>
        <h1 class="text-white">Bienvenido/a!</h1>
      </div>
    </div>
  </div>
</div>
<div class="separator separator-bottom separator-skew zindex-100">
  <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1">
    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
  </svg>
</div>
@if (Session::has('messages'))
{!! Session::get('messages') !!}
@endif
@else
<div class="separator separator-bottom separator-skew zindex-100">
  <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1">
    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
  </svg>
</div>
@endguest
<div class="modal fade open" id="searchContent">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col">
          <h3><span class="fa fa-user"></span> 
            Descargar Contenidos por fecha
          </h3>
        </div>
        <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="post" action="{{route('all.content')}}">
          {{ csrf_field() }}
          
          <div class="form-group{{ $errors->has('area_slug') ? ' has-error' : '' }}">
            <select id="area_slug" class='form-control' value='0' name="area_slug" size='1'>
              <option value="0">Areas</option>

              @foreach($area as $item)
              <option value="{{$item->slug}}">{{$item->id}} - {{$item->area}}</option>
              @endforeach                   
            </select>
            @if ($errors->has('area_slug'))
            <span class="help-block">
              <strong>{{ $errors->first('area_slug') }}</strong>
            </span>
            @endif
          </div>

          <div class="d-none form-group{{ $errors->has('career_slug') ? ' has-error' : '' }}" id="div_career">
            <select id="career" class='form-control' value='0' name="career_slug" size='1'>
            </select>
            
            @if ($errors->has('career_slug'))
            <span class="help-block">
              <strong>{{ $errors->first('career_slug') }}</strong>
            </span>
            @endif

          </div>

          <div class="form-group">
            <label>Fecha:</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>
              <input type="text" name="last_date" id="last_date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
            </div>
            <!-- /.input group -->
          </div>

          <div class="form-group">
            <div class="col">
              <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
              @if ($errors->has('g-recaptcha-response'))
              <span class="invalid-feedback" style="display: block;">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="modal-footer"> 
          <div class='container'>
            <div class="row">        
              <div class="col-12">
                <button target="_blank" id='button_download' type="submit" class="d-none btn btn-primary btn-block btn-flat">Descargar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
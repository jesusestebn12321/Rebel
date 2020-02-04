<div class="modal fade open" id="downloadPublic">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col">
          <h3><span class="fa fa-user"></span> 
            Descargar PDF
          </h3>
        </div>
        <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="GET" action="{{route('download.public',Auth::user()->slug)}}">
          {{ csrf_field() }}
          
          <div class="form-group{{ $errors->has('area_public_slug') ? ' has-error' : '' }}">
            <select id="area_public_slug" class='form-control' value='0' name="area_public_slug" size='1'>
              <option value="0">Areas</option>

              @foreach($area as $item)
              <option value="{{$item->slug}}">{{$item->id}} - {{$item->area}}</option>
              @endforeach                   
            </select>
            @if ($errors->has('area_public_slug'))
            <span class="help-block">
              <strong>{{ $errors->first('area_public_slug') }}</strong>
            </span>
            @endif
          </div>

          <div class="d-none form-group{{ $errors->has('career_public_slug') ? ' has-error' : '' }}" id="div_career_public">
            <select id="career_public" class='form-control' value='0' name="career_public_slug" size='1'>
            </select>
            
            @if ($errors->has('career_public_slug'))
            <span class="help-block">
              <strong>{{ $errors->first('career_public_slug') }}</strong>
            </span>
            @endif

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
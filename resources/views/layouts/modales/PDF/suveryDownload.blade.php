<div class="modal fade open" id="downloadEquivalencias">
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
                <form class="form-horizontal" method="get" action="{{route('equivalencia',Auth::user()->slug)}}">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                      <div class="col-md-6">
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
                                <button target="_blank" type="submit" class="btn btn-primary btn-block btn-flat">Descargar</button>
                            </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
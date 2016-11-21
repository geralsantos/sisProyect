<div id="ajax_login">
                
             @if(count($errors)>0)
                       @foreach($errors->get($key) as $e)
                       <p> {{$e}}</p>
                    @endforeach
                    @endif
 </div>  
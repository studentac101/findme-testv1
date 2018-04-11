<div class="form-group {{$errors->has($name)? 'has-error':''}}">
  <label for="">{{$label}}</label>

  <!-- 2nd parameter should be the options of the select html tag-->

  {{Form::select($name,$options,$value,['class'=>'form-control'])}}

  @if($errors->has($name))
  <p class="help-block" style="color:red; font-size:10px">*{{$errors->first($name)}}</p>
  @endif
</div>

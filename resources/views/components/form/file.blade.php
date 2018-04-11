<div class="form-group {{$errors->has($name)? 'has-error' : ''}}">
  <label>{{$label}}</label>
  {{ Form::file($name,$value,array_merge(['class'=>'form-control btn btn-success'],$attributes)) }}
  @if($errors->has($name))
  <p class="help-block" style="color:red; font-size:10px">*{{$errors->first($name)}}</p>
  @endif
</div>

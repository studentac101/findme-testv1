<div class="form-group {{$errors->has($name)? 'has-error' : ''}}">
  <label for="">{{$label}}</label>
  {{Form::password($name,array_merge(['class'=>'form-control'],$attributes))}}
  @if($errors->has($name))
  <p class="help-block">* {{$errors->first($name)}}</p>
  @endif
</div>

<div class="form-group{{$errors->has($name)? 'has-error':''}}">
  <label for="">{{$label}}</label>
  <!-- this will determine what type of input you are making -->
  {{ Form::text($name,$value,array_merge(['class'=>'form-control'],$attributes)) }}
  @if($errors->has($name))
  <p class="help-block" style="color:red; font-size:10px">*{{$errors->first($name)}}</p>
  @endif
</div>

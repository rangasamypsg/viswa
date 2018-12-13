<div class="form-group{{ $errors->has('staff_name') ? ' has-error' : '' }}">
    {!! Form::label('Staff Name','Staff Name', array('class' => 'col-md-4 control-label')) !!} 
    
    <div class="col-md-6">
        {{ Form::text('staff_name', null, array('_required','class' => 'form-control','placeholder'=>'Your Staff Name')) }} 
        @if ($errors->has('staff_name'))
            <span class="help-block">
                <strong>{{ $errors->first('staff_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
    {!! Form::label('Position','Position', array('class' => 'col-md-4 control-label')) !!} 
    
    <div class="col-md-6">
        {{ Form::text('position', null, array('_required','class' => 'form-control','placeholder'=>'Your Position')) }} 
        @if ($errors->has('position'))
            <span class="help-block">
                <strong>{{ $errors->first('position') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('staff_id') ? ' has-error' : '' }}">
    {!! Form::label('Staff ID','Staff ID', array('class' => 'col-md-4 control-label')) !!} 
    
    <div class="col-md-6">
        {{ Form::text('staff_id', null, array('_required','class' => 'form-control','placeholder'=>'Your Staff ID')) }} 
        @if ($errors->has('staff_id'))
            <span class="help-block">
                <strong>{{ $errors->first('staff_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
    {!! Form::label('City','City', array('class' => 'col-md-4 control-label')) !!} 
    
    <div class="col-md-6">
        {!! Form::select('city_id', $cities, null, ['class' => 'form-control' , 'id' => 'city_id' ]) !!}
        @if ($errors->has('city_id'))
            <span class="help-block">
                <strong>{{ $errors->first('city_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}">
    {!! Form::label('Staff Image','Staff Image', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">        
        {!! Form::file('profile_image', array('class' => 'image')) !!}
		<br/>
        
		@if (!empty($staff))
			@if (!empty($staff->profile_image))
				<img src="{{url('/images/staff_images/'.$staff->profile_image)}}" class="img-circle" alt="Image" width="100px" height="100px" />
			@else 
				<img src="{{url('/images/pro-empty.png')}}" class="img-circle" alt="Image" width="100px" height="100px" />  
			@endif
		@endif
		
		@if ($errors->has('profile_image'))
            <span class="help-block">
                <strong>{{ $errors->first('profile_image') }}</strong>
            </span>
        @endif
    </div>
</div>

